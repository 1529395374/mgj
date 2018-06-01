<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Admin\Ad;
use DB;
class AdverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request -> input('search','');//接收的广告名称
        $cate = $request -> input('cate','');//接收广告类别
        $count = DB::table('advers')->count();
        $page_count = $request->input('page_count',1);
        $Ad =new Ad(); //创建数据对象
        if(isset($search) && !empty($search)){
            $Ad =  $Ad::where('acustomer','like','%'.$search.'%');
        }
        if(isset($cate) && !empty($cate)){
            $Ad =  $Ad->where('cate',$cate);
        }
        $data = $Ad->paginate($page_count);
        // 加载广告列表模板
        return view('Admin.Adver.index',['title'=>'广告管理','count'=>$count,'data'=>$data,'search'=>$request->all(),'cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加页面
        return view('Admin.Adver.add',['title'=>'广告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'acustomer' => 'required',
            'atitle' => 'required',
            'aurl1' => 'required',
            'aprice' => 'required',
        ], [
            'acustomer.required' => '顾客信息必填',
            'atitle.required'  => '广告标题必填',
            'aurl1.required'  => '广告地址必填',
            'aprice.required'  => '广告价格必填',
        ]);
        // 接收用户提交的数据
        $adver_data = $request -> except('_token');
        // dd($adver_data);
        if($request->hasFile('apic1') == true){
            $pic1 = $request -> file('apic1');
            $hz = $pic1 -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$hz;;
            $dir_name = './Admins/uploads/'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name; // 拼接路径
            $as = $pic1 -> move($dir_name,$temp_name);//执行上传
            $adver_data['apic1'] = $as;
        }
        $res = AD::create($adver_data);
        // dd($res);
        if ($res) {
            return redirect('/admin/adver')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
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
        // 获取要修改的数据
        $data = AD::find($id);
        // dd($data);
        return view('Admin.Adver.edit',['title'=>'广告修改','data'=>$data]);
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
        $this->validate($request, [
            'atitle' => 'required',
            'aurl1' => 'required',
            'aprice' => 'required',
        ], [
            'atitle.required'  => '广告标题必填',
            'aurl1.required'  => '广告地址必填',
            'aprice.required'  => '广告价格必填',
        ]);
        $ad = Ad::find($id);
        $adver_data = $request -> except('_token');
        // dd($adver_data);
        if($request->hasFile('apic1') == true){
            $pic1 = $request -> file('apic1');
            $hz = $pic1 -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$hz;;
            $dir_name = './Admins/uploads/'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name; // 拼接路径
            $as = $pic1 -> move($dir_name,$temp_name);//执行上传
            $adver_data['apic1'] = $as;
        }
        if(!isset($filename)){
            $ad -> apic1 = $ad -> apic1; 
        }else{
            $ad -> apic1 = $filename;
        }
        $ad -> aprice = $request -> input('aprice');    
        $ad -> atitle = $request -> input('atitle');
        $ad -> aurl1  = $request -> input('aurl1');
        $res = $ad -> save();
        // dd($res);
        if ($res) {
            return redirect('/admin/adver')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
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
        $res = AD::find($id)->delete();// 通过find查找到的id删除
        if ($res) {
            return redirect('/admin/adver')->with('success', '删除成功'); //跳转 并且附带信息

        } else {
            return back()->with('error', '删除失败');
        }
    }
}
