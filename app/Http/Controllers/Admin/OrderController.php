<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取分页数据
        $count = $request->input('count') ? $request->input('count') : '5';
        // 获取搜索数据
        $wlid = $request->input('wlid');
        if($wlid){
            // 获取数据
            $data = Order::where('wlid','like','%'.$wlid.'%')->paginate($count); 
        }else{
            // 获取数据
            $data = Order::paginate($count);
        }
        // dd($data[0]->order_user->username);
        return view('Admin/Order/index',['data'=>$data,'count'=>$count,'wlid'=>$wlid]);
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
        $data = Order::where('wlid',$id)->get();

        return view('admin/order/show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::where('wlid',$id)->first();
        return view('Admin/Order/edit',['data'=>$data]);
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
        $data = $request->input('state');
        // dd($data);
        $res = Order::where('wlid',$id)->update(['state'=>$data]);
        if($res){
            // 删除成功跳到显示页面
            return redirect('/admin/order')->with('success','修改成功');
        }else{
            // 删除失败跳到显示页面
           return redirect('/admin/order')->with('error','修改失败');
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
        $arr = Order::where('wlid',$id)->first();
        if($arr->state == 4){
            return redirect('/admin/order')->with('error','该订单未取消无法删除');
        }
       // 根据订单号执行删除
        $res = Order::where('wlid',$id)->delete();
        if($res){
            // 删除成功跳到显示页面
            return redirect('/admin/order')->with('success','删除成功');
        }else{
            // 删除失败跳到显示页面
           return redirect('/admin/order')->with('error','删除失败');
        }
    }
}
