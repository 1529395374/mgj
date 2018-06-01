<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use DB;

class CateController extends Controller
{
    /** 显示页面
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询数据并排序在分页
        $data = Cate::select('cid','pid','cname','path',DB::raw("concat(path,cid,',') as paths"))->orderBy('paths','asc')->paginate(10);
       
        // 加载显示页面
        return view('/Admin/Cate/index',['data'=>$data]);
    }

    /** // 加载添加表单
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // 加载添加表单并把查询到的类别加载到模板
        return view('/Admin/Cate/create');
    }

    /** 执行添加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 表单验证
        $this->validate($request,[
            'cname' => 'required|unique:jz_cate',
        ],[
            'cname.required' => '分类名称必填',
            'cname.unique' => '分类名称已存在',
        ]);
        // 接受表单数据
        $data = $request->except(['_token']);
        // dd($data['pid']);
        // 判断父类是否是顶级分类
        if($data['pid'] !== '0'){
            // 查询父类分类路径
            $path = Cate::select('path')->find($data['pid']);
            // 不是顶级分类，拼接分类路径
           $data['path'] = $path->path.$data['pid'].','; 
        }else{
            // 顶级分类路径
           $data['path'] = '0,';
        }
        
        // 执行添加
        $res = Cate::insert($data);
        if($res){
            // 添加成功跳到显示页面
            return redirect('/admin/cate')->with('success','添加成功');
        }else{
            // 添加失败返回到添加页面
           return redirect('/admin/cate/create')->with('error','添加失败');
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

    /** 修改页面
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param $data->pname 新增属性，用来表示父类名称
     */
    public function edit($id)
    {
        
        // 根据ID查询数据
        $data = Cate::find($id);
        // 查询父类是否是顶级分类
        $data->pname = Cate::find($data->pid) ? Cate::find($data->pid)->cname : '顶级分类';
        // 加载修改页面
        return view('Admin/Cate/edit',['data'=>$data]);
    }

    /** 执行修改
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 表单验证
        $this->validate($request,[
            'cname' => 'required|unique:jz_cate,cname,'.$id.',cid',
        ],[
            'cname.required' => '分类名称必填',
            'cname.unique' => '分类名称已存在',
        ]);
        // 获取表单传来的cname
        $data = $request->input('cname');

        // 根据ID执行修改
        $res = Cate::where('cid',$id)->update(['cname'=>$data]);

        if($res){
            // 修改成功跳到显示页面
            return redirect('/admin/cate')->with('success','修改成功');
        }else{
            // 修改失败返回到修改页面并返回ID
           return redirect('/admin/cate/'.$id.'/edit')->with('error','修改失败');
        }
    }

    /** 执行删除
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 判断分类下是否有子分类
        $cate = Cate::where('pid','=',$id)->first();
        if($cate){
            return redirect('/admin/cate')->with('error','该分类下有子类无法删除');
        }
        // 执行删除
        $res = Cate::destroy($id);

        if($res){
            // 删除成功跳到显示页面
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            // 删除失败跳到显示页面
           return redirect('/admin/cate')->with('error','删除失败');
        }
    }

    /** 显示添加子类表单
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function isedit($id)
    {
        // 查询数据
        $data = Cate::find($id);
        // 加载添加子类表单，显示父类
        return view('Admin/Cate/isedit',['data'=>$data]);
    }

    /** 执行添加子类
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function issave(Request $request,$id)
    {   
        // 表单验证
        $this->validate($request,[
            'cname' => 'required|unique:jz_cate',
        ],[
            'cname.required' => '分类名称必填',
            'cname.unique' => '分类名称已存在',
        ]);
        // 获取表单数据
        $data['cname'] = $request->input('cname');
        // 根据父类ID查询父类的路径(path)并拼接父类ID,形成路径
        $data['path'] = Cate::find($id)->path.$id.',';
        // 添加父类ID
        $data['pid'] = $id;
        // 执行添加
        $res = Cate::insert($data);
        if($res){
            // 添加成功跳到显示页面
            return redirect('/admin/cate')->with('success','添加成功');
        }else{
            // 添加失败跳到添加子类页面
           return redirect('/admin/cate/isedit'.$id.'')->with('error','添加失败');
        }

    }

}
