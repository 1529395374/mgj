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
        // dd($_POST);
         //获取输入的值
        $data = $request ->except('_token');
        $car_data = new Carousel;  
        $car_data -> profile = $data['profile'];
        $car_data -> url_profile = $data['url_profile'];
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
         //实例化模型 添加数据
        $car_data = Carousel::find($id);
        if (!empty($data['profile'])) {
                $car_data -> profile = $data['profile'];
          }
        $car_data -> url_profile = $data['url_profile'];
        $res = $car_data -> save();
         if($res){
            return redirect('/admin/carousel')->with('success','修改成功'); 
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
        //实例化数据表
        $car_data = Carousel::find($id);
         $res = $car_data->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function test1(Request $request)
    {
         // dd($request->hasFile('img_one'));
          //创建第一张轮播图上传对象
        if($request->hasFile('profile') == true){
            $profile = $request -> file('profile');
            $ext = $profile -> getClientOriginalExtension();
            $temp_name = time()+rand(10000,99999).'.'.$ext;
            //创建文件存放目录
            $dir_name = './Admins/uploads/Carousel/profile'.date('Ymd',time());
            $filename = $dir_name.'/'.$temp_name;
            //执行上传
            $res = $profile -> move($dir_name,$temp_name);
            if ($res) {
                $arr = [
                    'code'=>1,
                    'msg'=>'上传成功',
                    'data'=>[
                        'src'=>ltrim($dir_name.'/'.$temp_name,'.')
                    ]
                ];
            }else{
                $arr = [
                    'code'=>0,
                    'msg'=>'上传失败',
                    'data'=>[
                        'src'=>''
                    ]
                ];
            }
        }

        echo json_encode($arr);
    }
}
