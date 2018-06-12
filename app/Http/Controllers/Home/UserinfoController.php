<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userinfo;
class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.info.userinfo');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home.info.userinfo'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        //接受form表单提交的值修改并保存信息
        $data = $request -> except('_method','_token');
        //dd($data);
       
        $info = Userinfo::where('uid',$id)->first();
        // dd($info);
        $info->tel = $data['tel'];
        $info->age = $data['age'];
        $info->addr = $data['addr'];
        $info->sex = $data['sex'];
        $info->email = $data['email'];
        $uid = $info['uid'];

        $user = User::where('id',$uid)->first();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->tel = $data['tel'];
        //判断图片是否更改
        if (!empty($data['pic'])) {
                $user->pic = $data['pic'];
          }
        // dd($user);
        $user->save();
        $info->save();
        //存sesiion
        $user->age = $info->age;
        $user->sex = $info->sex;
        $user->addr = $info->addr;
        // dd($user);
        
        if($user || $info){
            $request->session()->put('log', $user);
            
            return redirect('/')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    public function uploads(Request $request)
    {

        // 检测是否有文件上传
       if($request -> hasFile('pic')){
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 处理图片 路径和图片的名称
            $dir_name = './uploads/'.date('Ymd');
            $file_name = str_random(20);
            // 获取后缀
            $hz = $pic ->getClientOriginalExtension();
            $name = $file_name.'.'.$hz;//拼接路径便于存储
            $res = $pic -> move($dir_name,$name);

            if($res){
                $arr = [
                    'code'=>1,
                    'msg'=>'上传成功',
                    'data'=>[
                        'src'=> ltrim($dir_name.'/'.$name, '.')
                    ],
                ];
            }else{
                $arr = [
                    'code'=>0,
                    'msg'=>'上传失败',
                    'data'=>[
                        'src'=> ''
                    ],
                ];
            }
       }
       //处理返回值
       echo json_encode($arr);
       
    }

    
}
