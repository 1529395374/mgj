<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cate;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getIndex($id)
    {

        // 声明一个数组
        $arr = [];
        // 查询所有的子类
        $arr_id = Cate::select('cid')->where('path','like','%,'.$id.',%')->get();
        // 转换指定格式
        foreach($arr_id as $v){
            $arr[] = $v->cid;
        }
        // 加上本类
        $arr[] = $id;
    	// 查询数据
        $data = Goods::whereIn('cid',$arr)->get();

        
        // 查询父类
        $cate_pic = Cate::find($id);
        // 转换成数组
        $cate_pics = explode(',',$cate_pic->path);
        // 把本类id加到数组中
        array_splice($cate_pics,-1,1,$id);
        // 查询父类名称(包括本类)
        $cate_pics = Cate::select('cname')->whereIn('cid',$cate_pics)->get();
        // 声明变量
        $set = '';
        // 遍历查询到的名称并拼接指定格式到变量中
        foreach($cate_pics as $v){
            $set .=' > '.$v->cname;
        }
        // 显示数据
        return view('/Home/Goods/index',['data'=>$data,'set'=>$set]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStore($id)
    {   
    	// 查询数据
        $data = Goods::find($id);
	// 显示数据
        return view('/Home/Goods/store',['data'=>$data]);
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


    public function search(Request $request)
    {
             //接受搜索的关键字
        $gname = $request -> input('gname');
        // 关键字为商品名称
        $data1 = Goods::where('gname','like','%'.$gname.'%')->get();
        //存商品id
        $id = [];
        foreach ($data1 as $key => $value) {
            $id[] = $value->id;
        }
        // 关键字为一级分类
        // 存商品分类id
        $cid = [];
        $tmp = Cate::where('cname','like','%'.$gname.'%')->get();
        foreach ($tmp as $k => $value) {
            $cid[] = $value ->cid;
        }
        // 用商品分类查询所有商品
        $data2 = Goods::whereIn('cid',$cid)->get();
        // 存下商品id
        foreach ($data2 as $key => $value) {
            $id[] = $value -> id;
        }
        // 去除重复id
        $id = array_unique($id);
        $count = count($id);
        $data = Goods::whereIn('id',$id)->where('status','1')->where('gnum','>',1)->get();
        $set = '';
        return view('/Home/Goods/index',['data'=>$data,'gname'=>$gname,'count'=>$count,'set'=>$set]);
    }
}
