<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\CarouselRequest;
use App\Http\Requests\CarouselupdateRequest;
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取网站配置信息
        $data = Carousel::get();
        //加载模板
        return view('Admin.Carousel.index',['title'=>'轮播管理','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加模板
        return view('Admin.Carousel.create',['title'=>'轮播图添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {
         //获取输入的值
        $data = $request ->except('_token');
         //创建第一张轮播图上传对象
         if($request->hasFile('img_one') == true){
            $img_one = $request -> file('img_one');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_one'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $aa = $img_one -> move($dir_name,$temp_name);
            $data['img_one'] = $aa;
        }
        //创建第二张轮播图上传对象
         if($request->hasFile('img_two') == true){
            $img_one = $request -> file('img_two');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_two'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $bb = $img_one -> move($dir_name,$temp_name);
            $data['img_two'] = $bb;
        } 
        //创建第三张轮播图上传对象
        if($request->hasFile('img_three') == true){
            $img_one = $request -> file('img_three');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_three'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $cc = $img_one -> move($dir_name,$temp_name);
            $data['img_three'] = $cc;
        }
        //实例化模型 添加数据
        $car_data = new Carousel;  
        $car_data -> img_one = $data['img_one'];
        $car_data -> img_two = $data['img_two'];
        $car_data -> img_three = $data['img_three'];
        $car_data -> url_one = $data['url_one'];
        $car_data -> url_two = $data['url_two'];
        $car_data -> url_three = $data['url_three'];
        $res = $car_data -> save();
         if($res){
            return redirect('/admin/carousel')->with('success','添加成功'); 
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
        $data = Carousel::find($id);
        /*dd($data);*/
        //添加修改页面
        return view('Admin.Carousel.edit',['title'=>'轮播图修改','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselupdateRequest $request, $id)
    {
         //获取输入的值
        $data = $request ->except('_token');
         //创建第一张轮播图上传对象
         if($request->hasFile('img_one') == true){
            $img_one = $request -> file('img_one');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_one'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $a1 = $img_one -> move($dir_name,$temp_name);
            $data['img_one'] = $a1;
        }
        //创建第二张轮播图上传对象
         if($request->hasFile('img_two') == true){
            $img_one = $request -> file('img_two');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_two'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $a2 = $img_one -> move($dir_name,$temp_name);
            $data['img_two'] = $a2;
        } 
        //创建第三张轮播图上传对象
        if($request->hasFile('img_three') == true){
            $img_one = $request -> file('img_three');
            $ext = $img_one -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/img_three'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $a3 = $img_one -> move($dir_name,$temp_name);
            $data['img_three'] = $a3;
        }
         //实例化模型 添加数据
        $car_data = Carousel::find($id);
        if (!empty($data['img_one'])) {
                $car_data -> img_one = $data['img_one'];
          }elseif (!empty($data['img_two'])) {
                $car_data -> img_two = $data['img_two'];
          }elseif (!empty($data['img_two'])) {
                $car_data -> img_three = $data['img_three'];
          }
        $car_data -> url_one = $data['url_one'];
        $car_data -> url_two = $data['url_two'];
        $car_data -> url_three = $data['url_three'];
        $res = $car_data -> save();
         if($res){
            return redirect('/admin/carousel')->with('success','修改成功'); 
        }else{
            return back()->with('errors','修改失败');
        }

        // $res = Carousel::find($id)->update(['img_one' => $data['img_one'],'img_two' => $data['img_two'],'img_three' => $data['img_three'],'url_one' => $data['url_one'],'url_two' => $data['url_two'],'url_three' => $data['url_three'],]);
        // if($res){
        //     return redirect('/admin/carousel')->with('success','修改成功'); //跳转 并且附带信息
        // }else{
        //     return back()->with('error','修改失败'); //跳转 并且附带信息
        // }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //实例化数据表
        $car_data = Carousel::find($id);
         $res = $car_data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
