<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cate;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查询分类类别
        $data = DB::select("select *,concat(path,cid,',') as paths from jz_cate order by paths asc");

        // 显示添加商品表单
        return view('Admin/Goods/create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 检测是否有文件上传
        if($request -> hasFile('pic')){
            // 创建文件上传对象
            $pic = $request -> file('pic');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $pic ->getClientOriginalExtension();
            // 生成随机文件名
            $temp_name = time().rand(1000,9999).'.'.$ext;
            // 图片存储文件路径
            $dir_name = '/uploads/'.date('Ymd',time());
            // 拼接完整路径
            $name = $dir_name.'/'.$temp_name;
            // 存储文件
            $pic -> move($dir_name,$temp_name);
        } 

        $data = $request->except(['_token']);
        $data['pic'] = $name; 
        // dd($data);

        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
