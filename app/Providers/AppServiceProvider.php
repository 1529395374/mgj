<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cate;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /** 前台三级菜单递归
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function CateIndex($pid = 0)
    {
        $data = Cate::where('pid',$pid)->get();
        $arr = [];
        foreach($data as $k=>$v){
            // echo $v->cid;
            $v['tow_cate'] = self::CateIndex($v->cid);
            $arr[] = $v;
        }
        return $arr;
    }

    /** 分配公共属性
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 查询分类信息并排序
        $cate_cname = Cate::select('cid','pid','cname','path',DB::raw("concat(path,cid,',') as paths"))->orderBy('paths','asc')->get();
        // 前台三级菜单
        $Home_cate = self::CateIndex(0);
        // 分配到每个模板
        view()->share(['cate_cname'=>$cate_cname,'Home_cate'=>$Home_cate]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
