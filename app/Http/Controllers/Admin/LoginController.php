<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\Userinfo;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

        //显示后台登录页
        return view('admin.login.index');
    }

    //后台登录
    public function dologin(Request $request)
    {
        
        //密码md5加盐
        $salt = 'asd!@#$%^&*()_+';
        //接收数据
        $data = $request -> except('_token'); 

        $uname = $data['username'];
        $password = md5($data['password'].$salt);
        
        //检测验证码是否正确
        if($data['code'] !== session('code')){
            return back()->with('error','验证码错误');
        }

        //检测接收的用户名和密码是否与数据库里的值一致
        $res = DB::table('users')->where('username', '=', $uname)->where('upwd', '=', $password)->first();
        //判断$res检测账号或密码是否正确
        if(!$res){
            return back()->with('error','账号或密码不正确');
        }

        //查询登录者的id
        $id = $res->id;
        //通过user表中的id查询userinfo中的auth权限
        $info = Userinfo::where('uid',$id)->first();
        //通过检测权限是否能能录后台
        if($info->auth != 1){
             return back()->with('error','无权限');
            }

        //检测是否有权限登录后台
        
        // 存入sessi中  $request->session()->put('login', $res);
        // 检测$res是否为空数组
        if($res != []){

            $request->session()->put('login', $res);
            return redirect('/admin/user')->with('success','登录成功');
        }else{
            
            return back()->with('error','登录失败');
        }

    }

    //后台退出
    public function logout(Request $request)
    {
        
        $request->session()->pull('login', false);
        return redirect('/admin/login')->with('success','退出成功');
    }
}
