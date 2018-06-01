<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Link;
use DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收搜索关键字
        $search = $request -> input('search','');
        //查数据
        $count = DB::table('links')->count();
        $page_count = $request->input('page_count',1);
        //获取数据
        $link = DB::table('links');
        if(isset($search) && !empty($search)){
            $link -> where('lname','like','%'.$search.'%');
        }
        $data = $link->paginate($page_count);
        // 加载视图
        return view('Admin.Link.index',['title'=>'友情链接管理','data'=>$data,'count'=>$count,'search'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加视图
        return view('Admin.Link.add',['title'=>'友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lname' => 'required',
            'lurl' => 'required',
        ], [
        'lname.required' => '标题是必填的',
        'lurl.required'  => '链接地址必填',
    ]);
        //接收数据
        $link_data = $request ->except('_token');
        // dd($link_data);
        if($request->hasFile('limg') == true){
            $limg = $request -> file('limg');
            $hz = $limg -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$hz;;
            $dir_name = './Admins/uploads/'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name; // 拼接路径
            $as = $limg -> move($dir_name,$temp_name);//执行上传
            $link_data['limg'] = $as;
        }
        $res = Link::create($link_data);
        if($res){
            return redirect('/admin/link')->with('success','添加成功'); //跳转 并且附带信息
        }else{
            return back()->with('errors','添加失败');
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
        //通过id查询信息
        $data = Link::find($id);
        return view('Admin.Link.edit',['title'=>'友情链接修改','data'=>$data]);
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
        $this->validate($request, [
            'lname' => 'required',
            'lurl' => 'required',
        ], [
            'lname.required' => '标题是必填的',
            'lurl.required'  => '链接地址必填',
        ]);
        //获取用户输入的信息
        $link_data = $request -> except('_token');
        //创建文件上传对象
        if($request->hasFile('limg') == true){
            $limg = $request -> file('limg');
            $temp_name = time()+rand(10000,99999);
            $hz = $limg -> getClientOriginalExtension();
            $filename = $temp_name.'.'.$hz;
            $as = $limg -> move('./Admins/Uploads/',$filename);//执行上传
            $link_data['limg'] = $as;
            $res = Link::find($id)->update(['lname'=>$link_data['lname'],'lurl'=>$link_data['lurl'],'limg'=>$link_data['limg']]);
            if($res){
                return redirect('/admin/link')->with('success','修改成功'); //跳转 并且附带信息
            }else{
                return back()->with('error','修改失败'); //跳转 并且附带信息
            }

        }else{
            //如果不修改头像 查出数据库原有的图片
            $data = Link::find($id);
            $res = Link::find($id)->update(['lname'=>$link_data['lname'],'lurl'=>$link_data['lurl'],'limg'=>$data['limg']]);
            if($res){
                return redirect('/admin/link')->with('success','修改成功'); //跳转 并且附带信息

            }else{
                return back()->with('error','修改失败');
            }
        }
    }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public
        function destroy($id)
        {
            $res = Link::find($id)->delete();// 通过find查找到的id删除
            if ($res) {
                return redirect('/admin/link')->with('success', '删除成功'); //跳转 并且附带信息

            } else {
                return back()->with('error', '删除失败');
            }
        }
    }
