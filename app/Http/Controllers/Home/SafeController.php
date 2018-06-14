<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userinfo;
class SafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //账户安全页
        return view('home.Safe.index');
    }
    /**
     * 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     *
     * 手机号修改
     */
    public function postXgtel(Request $request, $id)
    {
        //接收原手机号 新手机号
        $data = $request->except('_token');

        //验证提交数据的规则
        $this->validate($request, [
                'ytel' => 'required',
                'tel' => 'required|unique:users|regex:/^1[3-9]{1}[\d]{9}$/',
            ],[
                'ytel.required' => '原手机号必填',
                'tel.required' => '新手机号必填',
                'tel.unique' => '新手机号已注册',
                'tel.regex' => '新手机号格式不正确',
            ]);

        //数据库里的手机号
        $user = User::find($id);
        if($data['ytel'] != $user['tel']){
            return back()->with('error','原手机号输入不正确');
        }

        $info = Userinfo::where('uid',$id)->first();
        $info->tel = $data['tel'];
        $res2 = $info->save();
        //正确则将新手机号保存到数据库字段
        $user->tel = $data['tel'];
        $res1 = $user->save();

        if($res1 && $res2){
            $request->session()->pull('log', false);
            return redirect('/')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
    /**
     * 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     *
     * 邮箱修改
     */
    public function postXgemail(Request $request, $id)
    {
        //接收原邮箱 新邮箱
        $data = $request->except('_token');

        //验证提交数据的规则
        $this->validate($request, [
                'yemail' => 'required',
                'email' => 'required|unique:users|email',
            ],[
                'yemail.required' => '原邮箱必填',
                'email.required' => '新邮箱必填',
                'email.unique' => '新邮箱已注册',
                'email.email' => '新邮箱格式不正确',
            ]);

        //数据库里的邮箱
        $user = User::find($id);
        if($data['yemail'] != $user['email']){
            return back()->with('error','原邮箱输入不正确');
        }
        $info = Userinfo::where('uid',$id)->first();
        $info->email = $data['email'];
        $res2 = $info->save();
        //正确则将新邮箱保存到数据库字段
        $user->email = $data['email'];
        $res1 = $user->save();

        if($res1 && $res2){
            $request->session()->pull('log', false);
            return redirect('/')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
    /**
     * 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     *
     * 密码修改
     */
    public function postXgupwd(Request $request, $id)
    {
        //密码加盐
        $salt = 'asd!@#$%^&*()_+';

        //验证提交数据的规则
        $this->validate($request, [
                'yupwd' => 'required',
                'upwd' => 'required|regex:/[\w]{6,}/',
                'reupwd' => 'required|same:upwd',
            ],[
                'yupwd.required' => '原密码必填',
                'upwd.required' => '新密码必填',
                'upwd.regex' => '新密码最少六位',
                'reupwd.required' => '新确认密码必填',
                'reupwd.same' => '新确认密码与新密码不一致',
            ]);

        //接收数据
        $data = $request->except('_token'); //修改密码里的原密码
        //dump(md5($data['yupwd'].$salt));
        $user = User::find($id);    //原来添加的密码
        //dd($user['upwd']);
        
        //判断输入的密码与原始密码是否相同
        if(md5($data['yupwd'].$salt) != ($user['upwd'])){
            return back()->with('error','原密码输入不正确');
        }

        // 将新密码赋给数据库原密码字段
        $user->upwd = md5($data['upwd'].$salt);
        //dump(md5($data['xupwd'].$salt));
        $res3 = $user->save();
        //dd($res3);
        if($res3){
            $request->session()->pull('log', false);
            return redirect('/')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    
}
