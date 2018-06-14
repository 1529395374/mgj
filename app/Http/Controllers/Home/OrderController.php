<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Goods;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        if(!session('log')){
            return redirect('/home/login')->with('success','请先登录');
        }
        // 订单列表
        $data = Order::where('uid',session('log')->id)->orderBy('state','desc')->get();
        // 渲染模板
        // dd($data);
        $tmp2 = [];
        foreach ($data as $key => $value) {
          //订单号
          $id = $value -> gid;
          //商品信息
          $tmp = Goods::find($id);
          $value -> gname = $tmp -> gname;
          $value -> pic = $tmp ->pic;
          $value -> dj = $tmp ->price;
          $value -> gid = $tmp ->id;
          // 订单详情信息
          $tmp2[$value->wlid][] = $value;
        }

        // dd($tmp2);
        return view('/Home/Order/index',['data'=>$tmp2]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        // echo $id;
        $res = Order::where('wlid',$id)->update(['state'=>'4']);
        if($res){
            return redirect('/home/order/index')->with('success','订单已取消');
        }else{
            return redirect('/home/order/index')->with('success','取消订单失败');
        }
    }

   
}
