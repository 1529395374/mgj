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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
