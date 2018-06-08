<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\register;
use App\Models\Userinfo;
use DB;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('/home/register/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home/register/create');
    }

    public function tel_code(Request $request)
    {

        $tel = $request -> input('tel','17710592492');
        $pcode = rand(100000,999999);
        session(['tel_code'=>$pcode]);
        $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&format=json&account=C86411171&password=0138286c93ca1eaf0a18b6faa1b62d2f&mobile='.$tel.'&content=您的验证码是：'.$pcode.'。请不要把验证码泄露给其他人。';
        $curlHandler = curl_init(); //curl  模拟http请求
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curlHandler);
        echo $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // 检测是否是手机号注册
            if($request -> input('tel_type') == 1){
                //开始事务
                DB::beginTransaction();
                 //验证提交数据的规则
                $this->validate($request, [
                        'password' => 'required|regex:/[\w]{6,}/',
                        'repassword' => 'required|same:password',
                        'tel' => 'required|regex:/^1[3-9]{1}[\d]{9}$/',
                        'tel_code' => 'required',
                    ],[
                        'password.required' => '密码必填',
                        'password.regex' => '密码最少6位',
                        'repassword.required' => '确认密码必填',
                        'repassword.same' => '确认密码与密码不一致',
                        'tel.required' => '手机号必填',
                        'tel.regex' => '手机号格式不正确',
                        'tel_code.required' => '手机验证码必填',
                    ]);

                // 密码加盐
                $salt = 'asd!@#$%^&*()_+';
                //获取手机号
                $tel = $request -> input('tel','17710592492');
                $code = $request -> input('tel_code','');
                $pass = md5($request -> input('password','123456').$salt);
                $token = str_random(50);
                $id = Register::insertGetId(['tel'=>$tel,'upwd'=>$pass,'token'=>$token]);
                // dump(session('tel_code'));    
                // dump($code);
                $info = new Userinfo;
                $info -> uid = $id;
                $info -> auth = $request -> input('auth','2');
                $info -> tel = $request -> input('tel','17710592492');
                $res = $info->save();


            if($code != session('tel_code')){
                return back()->with('error','验证码错误');
            }

            if($id && $res){
                DB::commit();   //提交事务
                //注册成功
                return redirect('/home/register/create')->with('success','注册成功');
            }else{
                DB::rollBack(); //回滚事务
                //注册失败
                return back()->with('error','注册失败');
                //dd('注册失败');
            }

        }else{
            //开始事务
            DB::beginTransaction();
            //验证提交数据的规则
                $this->validate($request, [
                        'password' => 'required|regex:/[\w]{6,}/',
                        'repassword' => 'required|same:password',
                        'email' => 'required|email',
                    ],[
                        'password.required' => '密码必填',
                        'password.regex' => '密码最少6位',
                        'repassword.required' => '确认密码必填',
                        'repassword.same' => '确认密码与密码不一致',
                        'email.required' => '邮箱必填',
                        'email.email'   => '邮箱格式不正确',
                    ]);
            // 密码加盐
            $salt = 'asd!@#$%^&*()_+';
            //将数据插入到数据库
            $email = $request -> input('email','');
            $pass = md5($request -> input('password','123456').$salt);
            $token = str_random(50);
            $id = Register::insertGetId(['email'=>$email,'upwd'=>$pass,'token'=>$token]);
            // dd($id);
            $info = new Userinfo;
            $info -> uid = $id;
            $info -> auth = $request -> input('auth','2');
            $info -> email = $request -> input('email','');
            $res = $info->save();

            if($id && $res){
                DB::commit();   //提交事务
                self::sendEmail($email,$id,$token);
                //注册成功
                return redirect('/home/register/create')->with('success','注册成功');
                
            }else{
                DB::rollBack(); //回滚事务
                //注册失败
                return back()->with('error','注册失败');
                //dd('注册失败');
            }
        }
        

    }

    public function jihuo(Request $request)
    {
        //  接收id
        $id = $request -> input('id','');
        //  接收token
        $token = $request -> input('token','');
        //  通过id获取插入的数据
        $user = Register::find($id);
        if(!$user){
            dd('链接非法');
        }
        //  dump($user);
        //  检测链接的有效性
        if($token != $user->token){
            dd('链接无效,请联系客服');
        }
        //  检测该账号是否激活
        if($user->status == 2){

            dd('该账号已经被激活，请不要重复激活');
        }
        // 激活
        $user -> status = 2;
        $user -> token = str_random(50);
        if($user -> save()){
            // 激活成功
           
            dd('激活成功');
        }else{
            dd('激活失败');
        }
    }

    //封装  邮箱发送
    public static function sendEmail($email,$id,$token)
    {
        // 发送邮箱
        //             模板                       参数                                 内置对象
        Mail::send('home.email.index', ['id' => $id,'token'=>$token,'email'=>$email], function ($m) use ($email) {
            $m->to($email)->subject('【蘑菇街】官网 注册邮件！');
        });

    }
    
}
