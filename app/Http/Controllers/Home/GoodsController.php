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
        // dd($arr);
    	// 查询数据
        $data = Goods::whereIn('cid',$arr)->get();
        // dd($data);
	   // 显示数据
        return view('/Home/Goods/index',['data'=>$data]);
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
}
