<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Home\Collect;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //检测用户是否登录
        if (empty(session('log'))) {
            return redirect('/home/login')->with('error', '请先登录');
        } else {
            // 获取session中的id
            $sid = session('log')->id;
            // dd($sid);
            // 获取商品的id
            $gid = $request->input('id');
            // dd($gid);
            $datas = Collect::get();
            $temp = [];
            foreach ($datas as $key => $val) {
                $temp[] = $val->gid;
            }
            //判断gid是否存在
            if(in_array($gid,$temp)){
                return back();
            }else{
                $collect = new Collect;
                $collect -> uid = $sid;
                $collect -> gid = $gid;
                $res = $collect ->save();
                if($res){
                    return redirect($_SERVER['HTTP_REFERER'])->with('success','收藏成功'); //跳转 并且附带信息
                }else{
                    return back()->with('errors','收藏失败');
                }
            }
        }
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sclist(Request $request)
    {
        //查询收藏表信息
        $data = Collect::where('uid',session('log')->id)->get();
        $tem = [];
        foreach ($data as $k => $v) {
            $tem[] = $v->gid;

        }
        //查询good表信息
        $collect_data = Goods::whereIn('id',$tem)->get();
        // dd($collect_data);
        return view('Home.Collect.index',['collect_data'=>$collect_data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sc(Request $request)
    {
        //实例化收藏表
        // $collect = Collect::where('uid',session('id'))->get();
        $collect = new Collect;
        $gid = $request -> input('id');
        // dd($gid);
        $collect = Collect::where('gid',$gid)->first();
        $res = $collect ->delete();
        if($res){
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
