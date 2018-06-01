<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsRequest;
use App\Models\Goods;
use App\Models\Cate;
use DB;

class GoodsController extends Controller
{
    /** 商品列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取数据
        $data = Goods::get();
        // 渲染视图
        return view('Admin/Goods/index',['data'=>$data]);
    }

    /** 商品添加
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示添加商品表单
        return view('Admin/Goods/create');
    }

    /** 执行商品添加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request)
    {
        // 获取表单数据
        $data = $request->except(['_token']);

        // 检测是否有文件上传
        if($request -> hasFile('pic')){      
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 获取后缀
            $ext = $pic ->getClientOriginalExtension();
            // 生成随机文件名
            $temp_name = time().rand(1000,9999).'.'.$ext;
            // 图片存储文件路径
            $dir_name = '/uploads/'.date('Ymd',time());
            // 拼接完整路径
            $name = $dir_name.'/'.$temp_name;
            // 存储文件
            $pic -> move('.'.$dir_name,$temp_name);
            // 赋值图片路径
            $data['pic'] = $name;
        } 
        
        // 执行添加
        $res = Goods::insert($data);
        if($res){
            // 添加成功跳到显示页面
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            // 添加失败返回到添加页面
           return redirect('/admin/goods/create')->with('error','添加失败');
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

    /** 商品修改
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data = Goods::find($id);

        // 显示修改表单
        return view('Admin/Goods/edit',['data'=>$data]);
    }

    /** 执行商品修改
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsRequest $request, $id)
    {
        // 获取表单数据
        $data = $request->except(['_token','_method']); 
        // 检测是否有文件上传
        if($request -> hasFile('pic')){
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 获取后缀
            $ext = $pic ->getClientOriginalExtension();
            // 生成随机文件名
            $temp_name = time().rand(1000,9999).'.'.$ext;
            // 图片存储文件路径
            $dir_name = '/uploads/'.date('Ymd',time());
            // 拼接完整路径
            $name = $dir_name.'/'.$temp_name;
            // 存储文件
            $pic -> move('.'.$dir_name,$temp_name);
            // 赋值图片路径
            $data['pic'] = $name;
        }
        
        // 修改添加
        $res = Goods::where('cid',$id)->update($data);
        if($res){
            // 修改成功跳到显示页面
            return redirect('/admin/goods')->with('success','修改成功');
        }else{
            // 修改失败返回到添加页面
           return redirect('/admin/goods/'.$id.'/edit')->with('error','修改失败');
        }
    }

    /** 删除商品
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // 根据ID执行删除
        $res = Goods::destroy($id);

        if($res){
            // 删除成功跳到显示页面
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
            // 删除失败跳到显示页面
           return redirect('/admin/goods')->with('error','删除失败');
        }
    }
}
