<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Home\Car;
use App\Models\Goods;
use App\Models\Home\Orders;
use App\Models\Home\Address;
class OrdersController extends Controller
{
    /**
     * 执行订单添加
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
       //订单信息
       
       $all  = $request -> except('_method','_token');
       $gid = explode(',',$all['gid']);
       $gnum = explode(',',$all['gnum']);
       $tmp = array_combine($gid, $gnum);
       // 收货人信息
       $person = Address::where('status',1)->where('id',session('log')->id)->first();
       //生成订单
       $created_at = time()+rand(10000,99999);
       foreach ($tmp as $key => $value) {
          $order = new Orders();
           $oid = $order -> insertGetId([
           'gnum' => $value,
           'gid' => $key,
           'money' => $all['total'],
           'wlid' => $created_at,
           'uid' => session('log')->id,
           'uname' => session('log')->username,
           'uphone' => $person->phone,
           'utname' => $person->name,
           'uaddress' => $person->address,
           'created_at'=>date('Y-m-d H:i:s',time())
        ]);
       }
       if($oid) {
           // return view('home.car.fbuy',['data'=>$data]);
           return redirect('/home/orders/orders_success?id='.$oid);
       } else {
           return back()->with('error', '网络延时,请稍后再试');
       }
   }


    /**
     * 加载订单成功页
     *
     * @return \Illuminate\Http\Response
     */
    public function orders_success(Request $request)
    {
        //加载订单成功页面
        $id = $request -> only('id');
        $wlid = Orders::find($id['id'])->wlid;
        $money = Orders::find($id['id'])->money;
        $orders = Orders::where('wlid',$wlid)->get();
        //删除购物车的信息
        //商品id
        $gid = [];
        //商品数量
        $gnum = [];
        foreach ($orders as $key => $value) {
          $gid[] = $value->gid;
          $gnum[] = $value->gnum;
        }
        //合并数组
        $gnums = array_combine($gid,$gnum); 
        $res = Car::where('uid',session('log')->id)->whereIn('gid',$gid)->delete(); 
        //减去相应的商品库存数
        foreach ($gnums as $key => $value) {
          $tmp = Goods::where('id',$key)->first();
          $tmpnum = $tmp->gnum;
          $tmp -> gnum = $tmpnum-$value;
          $res2 = $tmp->save();
          // $res2 = $tmp->update(['gnum'=>$tmpnum-$value]);
          
        }
        return view('home.car.fbuy',['wlid'=>$wlid,'money'=>$money]);   
    }
}
