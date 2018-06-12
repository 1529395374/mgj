<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Home\Car;
use App\Models\Goods;
use App\Models\Home\Address;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('log')) {
           // 获取所有购物车商品id与数量
        $tmpgood = Car::where('uid',session('log')->id)->lists('num','gid');
        // dump($tmpgood);
        // 获取所有商品id
        $tmp = [];
        foreach ($tmpgood as $key => $value) {
            //获取商品信息
            $tmp[$key] = Goods::find($key);
            //压入商品数量
            $tmp[$key]-> num = $value;
            // array_push($tmp[$key],$value);
        }  
        // dd($tmp);
        // die;
        return view('home.car.index',['tmp'=>$tmp]);
        }else{
            $tmp = [];
            return view('home.car.index',['tmp'=>$tmp]);
        }
        
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
        //添加商品到购物车
        //获取数据
        $all = $request-> except('_token','_method');
        $car = new Car();
        $car -> gid = $all['id'];
        $car -> num = $all['num'];
        //判断用户添加的是否为重复商品
        $tmp = $car->get();
        //获取购物车所有商品ID
        $tmpid = [];
        foreach ($tmp as $key => $value) {
            $tmpid[] = $value->gid;
        }
        if (in_array($all['id'], $tmpid)) {
            //修改重复商品的数量
            $oldgood = Car::where('gid',$all['id'])->first();
                    
            $oldgood-> num = $oldgood->num + $all['num'];
            $res = $oldgood -> save();
             //商品信息
            $good = new Goods();
            $data = $good->where('id',$all['id'])->first();
            $pic = $data -> pic;
            $gname = $data -> gname;
            $price = $data -> price;
            //重新生成 商品数量
            $num = $oldgood -> num;
            if ($res) {
                $arr = ['status'=>1,'msg'=>'添加到购物车','pic'=>$pic,'gname'=>$gname,'price'=>$price,'num'=>$num];
            } else {
                $arr = ['status'=>0,'msg'=>'添加购物车失败'];
            }
            return $arr;

        } else {

            $car -> uid = session('log')->id;
            $res =  $car -> save();
            //商品信息
            $good = new Goods();
            $data = $good->where('id',$all['id'])->first();
            $pic = $data -> pic;
            $gname = $data -> gname;
            $price = $data -> price;
            $num = $all['num'];
            if ($res) {
                $arr = ['status'=>1,'msg'=>'添加到购物车'];
            } else {
                $arr = ['status'=>0,'msg'=>'添加购物车失败'];
            }
            return $arr; 
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
        //执行删除
        $res = Car::where('gid',$id)->where('uid',session('log')->id)->delete();
        if ($res) {
                $arr = ['status'=>1,'msg'=>'删除成功'];
            } else {
                $arr = ['status'=>0,'msg'=>'删除失败'];
            }
            return $arr;
    }


    /**
     * 批量删除.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteall(Request $request)
    {
        $all = $request -> except('_token','_method');
        // return $all['id'];
        //执行删除
        $res = Car::where('uid',session('log')->id)->whereIn('gid',$all['id'])->delete();

        if ($res) {
                $arr = ['status'=>1,'msg'=>'删除成功'];
            } else {
                $arr = ['status'=>0,'msg'=>'删除失败'];
            }
            return $arr;
    }


    /**
     * 修改购物车数量
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Changenum(Request $request)
    {
        $all = $request -> except('_token','_method');
       // return $all;
       
       // 修改数据
       $car = Car::where('gid',$all['id'])->where('uid',session('log')->id)->first();
       // dd($car);
       $res = $car -> update(['num'=>$all['num']]);
    
        if ($res) {
                $arr = ['status'=>1];
            } else {
                $arr = ['status'=>0,'msg'=>'超出购买范围'];
            }
            return $arr;
    }


    public function rebuy(Request $request)
    {  
        // 用户收货地址
        $address = Address::where('id',session('log')->id)->where('status',1)->first();
        if (empty($address)) {
            return redirect('/home/address/create')->with('error','请添加收货地址');
        }
       // 接受用户提交的数据
        $all = $request -> except('_token','_method');
        // 商品id
        $gid = $all['gid'];
        $gid = explode(',',$gid);
        // 商品数量
        $num = $all['gnum'];
        $num = explode(',',$num);
        // 合并一个数组
        $tmpgood = array_combine($gid,$num);
        //压入商品数量
        $tmp = [];
        foreach ($tmpgood as $key => $value) {
            //获取商品信息
            $tmp[$key] = Goods::find($key);
            //压入商品数量
            $tmp[$key]-> num = $value;
            // array_push($tmp[$key],$value);
        } 
        //商品总价
        return view('home.car.rebuy',['address'=>$address,'tmp'=>$tmp,'total'=>$all['total']]);
    }
}