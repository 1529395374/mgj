<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 前台主页
Route::get('/','Home\IndexController@index');
//验证码
Route::get('/code','CodeController@index');
Route::get('/check','CodeController@check');
Route::get('/code/show','CodeController@show');
Route::post('/code/store','CodeController@store');

//后台登录
Route::post('/admin/login/dologin','Admin\LoginController@dologin'); //1:1
//加载后台登录页面
Route::get('/admin/login',function(){
	return view('/admin/login/index');
	});
//后台退出
Route::get('/admin/login/logout','Admin\LoginController@logout'); //1:1


//路由组  对一组路由进行统一的管理
Route::group(['middleware'=>'login'],function(){
		//后台修改密码
	Route::get('/admin/user/xpw/{id}','Admin\UserController@xpw'); //1:1
	Route::post('/admin/user/x1pw/{id}','Admin\UserController@x1pw'); //1:1
	//后台用户管理
	Route::resource('/admin/user','Admin\UserController');
});




// 后台显示添加子类表单
Route::get('/admin/cate/isedit/{id}','Admin\CateController@isedit');
// 后台执行添加子类
Route::post('/admin/cate/issave/{id}','Admin\CateController@issave');
// 后台分类管理
Route::resource('/admin/cate','Admin\CateController');
// 后台商品管理
Route::resource('/admin/goods','Admin\GoodsController');
// 前台商品管理
Route::Controller('/home/goods','Home\GoodsController');


//文章管理路由
Route::resource('/admin/articles','Admin\ArticlesController');
Route::post('/admin/carousel/test1','Admin\CarouselController@test1');
//轮播管理路由
Route::resource('/admin/carousel','Admin\CarouselController');




// 后台友情链接管理路由
Route::resource('admin/link','Admin\LinkController');
// 后台广告管理路由
Route::resource('admin/adver','Admin\AdverController');


