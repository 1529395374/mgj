<?php

namespace App\Http\Middleware;

use Closure;

class LoginAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //检测后台是否登录
        if ($request->session()->has('login')) {
            return $next($request);//执行下一次请求
        }else{
            //跳转到登录页面
            return redirect('/admin/login');//重定向
        }
        
    }
}
