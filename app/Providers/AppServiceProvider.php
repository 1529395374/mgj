<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cate;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 查询分类信息并排序
        $data = Cate::select('cid','pid','cname','path',DB::raw("concat(path,cid,',') as paths"))->orderBy('paths','asc')->get();
        // 分配到每个模板
        view()->share('cate_cname',$data);
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
