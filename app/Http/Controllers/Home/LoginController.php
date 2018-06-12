<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Userinfo;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.login.index');
    }

    public function dologin(Request $request)
    {
        //密码md5加盐
        $salt = 'asd!@#$%^&*()_+';
        //接收数据
        $data = $request -> except('_token'); 
        // dd($data);
        $user = $data['user'];
        $upwd = md5($data['upwd'].$salt);
        //检测邮箱
        $res = User::where('email', '=', $user)->where('upwd', '=', $upwd)->first();
        //检测手机号
        $res1 = User::where('tel', '=', $user)->where('upwd', '=', $upwd)->first();
        //检测用户名
        $res2 = User::where('username', '=', $user)->where('upwd', '=', $upwd)->first();

        if($res){
                    //检测是否激活
                if($res->status != 2){
                    return back()->with('error','账号未激活');
                }else{
                    $request->session()->put('log', $res);
                    //dd(session('log'));
                    return redirect('/')->with('success','登录成功');
                }
         }elseif($res1){
            $request->session()->put('log', $res1);
            return redirect('/')->with('success','登录成功');
        }elseif($res2){
            $request->session()->put('log', $res2);
            return redirect('/')->with('success','登录成功');
        }else{
            return back()->with('error','信息输入不正确');
        }     
        
    }

    //前台退出
        public function logout(Request $request)
        {
            $request->session()->pull('log', false);
            return redirect('/')->with('success','退出成功');
        }
}
