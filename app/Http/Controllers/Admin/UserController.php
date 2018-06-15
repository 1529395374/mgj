<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userinfo;
use Hash;
use DB;
use App\Http\Requests\UserInsertRequest;//添加字段验证
use App\Http\Requests\UserUpdateRequest;//修改字段验证
use App\Http\Requests\UserX1pwRequest;//修改密码字段验证
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收分页的条数
        $count = $request -> input('count',5);
        
        //关键字名字模糊搜索
        $search_username = $request -> input('username','');
        //以数组的方式接收所有的参数
        $params = $request -> all();
        //分页
        $data = User::where('username','like','%'.$search_username.'%')->paginate($count);  
        //显示视图  
        return view('admin.user.index',['data'=>$data,'params'=>$params,'title'=>'用户列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',['title'=>'添加列表']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertRequest $request)
    {

        //开始事务
            DB::beginTransaction();
        // 检测是否有文件上传
       if($request -> hasFile('pic')){
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $pic ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './Admins/Uploads/'.date('Ymd',time());
            //echo $dir_name;
            
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            //exit;
            $res1 = ltrim($pic -> move($dir_name,$temp_name),'.');
            // echo $res1;
            // exit;
        }
        //密码加盐
        $salt = 'asd!@#$%^&*()_+';
        //接受数据
        //dump($request -> all());
        $user = new User;
        $data = [
            'username' => $request -> input('username',''),
            'pic' =>$res1,
            'upwd' => md5($request -> input('upwd','').$salt),
            'email' => $request -> input('email',''),
            'tel' => $request -> input('tel',''),
            // 'upwd' => Hash::make($request -> input('upwd','')),
            'token' => str_random(50),      //随机50位加密字符串
            ];
            //dd($data);
        $uid = $user -> insertGetId($data);

        $userinfo = new Userinfo;
        $userinfo -> uid = $uid;
        $userinfo -> auth = $request -> input('auth','2');
        $userinfo -> age = $request -> input('age','');
        $userinfo -> tel = $request -> input('tel','');
        $userinfo -> email = $request -> input('email','');
        $userinfo -> addr = $request -> input('addr','');
        $userinfo -> sex = $request -> input('sex','m');
        // $userinfo -> ip = $_SERVER['REMOTE_ADDR'];
        $res = $userinfo -> save();
        if($uid && $res){
            DB::commit();   //提交事务
            return redirect('/admin/user')->with('success','添加成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //接收数据
        $data = User::find($id);
        //渲染视图
        return view('admin.user.userinfo',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        //dump($data->pic);
        //渲染视图
        //dd($data);
        return view('admin.user.edit',['data'=>$data,'title'=>'修改详情']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        //接受form表单提交的值
        $data = $request -> except('_token','_method'); 
        //dd($data);
       // 检测是否有文件上传
       if($request -> hasFile('pic')){
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $pic ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './Admins/Uploads/'.date('Ymd',time());
            //echo $dir_name;
            
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            //exit;
            $res2 = $pic -> move($dir_name,$temp_name);
           
        }
        $user = User::find($id);
        // $user->username = $data['username'];
        
        if(!isset($name)){
            $user->pic = $user->pic;
        }else{
            $user->pic = $res2;
        }
        $user2 = Userinfo::where('uid',$id)->first();
        //dd($data['sex']);
        //dd($user2);
        $user2->tel = $data['tel'];
        $user2->email = $data['email'];
        $user2->auth = $data['auth'];
        $user2->age = $data['age'];
        $user2->addr = $data['addr'];
        $user2->sex = $data['sex'];
        //dump($user2->sex);
        $user->save();
        $user2->save();

        if($user || $user2){
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //开始事务
       DB::beginTransaction();
       $res1 = User::destroy($id);
       $res2 = Userinfo::where('uid',$id)->delete();

       if($res1 && $res2){
            DB::commit();   //提交事务
            return redirect('/admin/user')->with('success','删除成功');
        }else{
            DB::rollBack(); //回滚事务
            return back()->with('error','删除失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xpw($id)
    {
        //通过id获取数据
        $data = User::find($id);
        //dump($data);
        
        //渲染修改密码视图
        return view('admin.user.xgpw',['data'=>$data,'title'=>'修改密码']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function x1pw(UserX1pwRequest $request,$id)
    {
        //密码加盐
        $salt = 'asd!@#$%^&*()_+';
        //接收数据
        $data = $request->except('_token'); //修改密码里的原密码
        //dump(md5($data['upwd'].$salt));
        $user = User::find($id);    //原来添加的密码
        //dd($user['upwd']);
        
        //判断输入的密码与原始密码是否相同
        if(md5($data['upwd'].$salt) != ($user['upwd'])){
            return back()->with('error','原密码输入不正确');
        }

        // 将新密码赋给数据库原密码字段
        $user->upwd = md5($data['xupwd'].$salt);
        //dump(md5($data['xupwd'].$salt));
        $res3 = $user->save();
        //dd($res3);
        if($res3){
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
        
    }

}
