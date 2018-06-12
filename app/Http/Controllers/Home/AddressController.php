<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use DB;
use App\models\Home\Address;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // 加载收货地址首页
            $sid = session('log')->id;
            $data = Address::where('id',$sid)->get();
            return view('Home.Address.index', ['title' => '收货地址列表', 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 加载收货地址添加和主页
        return view('Home.Address.add',['title'=>'添加收货地址']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取用户输入的地址
        $address_data = $request ->except('_token');
        //  dd($address_data);
        $id = session('log')->id;
        // dd($id);
        //验证规则
        $rule = [
            'address' => 'required|regex:/[\W]{8,50}/',
            'name' => 'required|regex:/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/',
            'phone' => 'required|regex:/^1{1}[\d]{10}$/',
            'email' => 'required|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',
        ];
        $msg = [
            'address.required' => '请填写收货地址',
            'address.regex' => '请填写汉字的收货地址至少8位最多50位',
            'name.required' => '请填写收货人姓名',
            'name.regex' => '请输入2-4个字的姓名',
            'phone.required' => '请填写联系电话',
            'phone.regex' => '请填写正确号码',
            'email.required' => '请填写邮箱',
            'email.regex' => '请填写正确的邮箱',
        ];
        $validator = Validator::make($address_data,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //插入数据
        $addr = new address;
        $addr -> id = $id;
        $addr -> address = $address_data['address'];
        $addr -> name = $address_data['name'];
        $addr -> email = $address_data['email'];
        $addr -> phone = $address_data['phone'];
        $res = $addr -> save();
        if($res){
            return redirect('/home/address')->with('success','添加成功'); //跳转 并且附带信息
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
        // 加载修改页面
        $data = Address::find($id);
        return view('Home.Address.edit',['title'=>'修改收货地址','data'=>$data]);
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
        $address_data = $request ->except('_token');
        //  dd($address_data);
        // dd($id);
        //验证规则
        $rule = [
            'address' => 'required|regex:/[\W]{8,50}/',
            'name' => 'required|regex:/^([\xe4-\xe9][\x80-\xbf]{2}){2,4}$/',
            'phone' => 'required|regex:/^1{1}[\d]{10}$/',
            'email' => 'required|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',
        ];
        $msg = [
            'address.required' => '请填写收货地址',
            'address.regex' => '请填写汉字的收货地址至少8位最多50位',
            'name.required' => '请填写收货人姓名',
            'name.regex' => '请输入2-4个字的姓名',
            'phone.required' => '请填写联系电话',
            'phone.regex' => '请填写正确号码',
            'email.required' => '请填写邮箱',
            'email.regex' => '请填写正确的邮箱',
        ];
        $validator = Validator::make($address_data,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //插入要修改的数据
        $addr = Address::find($id);
        // dd($addr);
        $addr -> address = $address_data['address'];
        $addr -> name = $address_data['name'];
        $addr -> email = $address_data['email'];
        $addr -> phone = $address_data['phone'];
        $res = $addr -> save();
        if($res){
            return redirect('/home/address')->with('success','修改成功'); //跳转 并且附带信息
        }else{
            return back()->with('errors','修改失败');
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
        $res = Address::find($id)->delete();// 通过find查找到的id删除
        if ($res) {
            return redirect('/home/address')->with('success', '删除成功'); //跳转 并且附带信息
        } else {
            return back()->with('error', '删除失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dafault($id)
    {
        //查询所有收货地址 将状态更改为2
        $sid = session('log')->id;
        $datas = Address::where('id',$sid)->update(['status'=>"2"]);
        //获取点击设为默认的id
        $res = Address::where('aid',$id)->update(['status'=>"1"]);
        if($res){
            return redirect('/home/address')->with('success','设置成功'); //跳转 并且附带信息
        }else{
            return back()->with('error','设置失败'); //跳转 并且附带信息
        }
    }
}
