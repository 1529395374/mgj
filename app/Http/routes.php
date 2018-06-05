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
//轮播管理路由
Route::resource('/admin/carousel','Admin\CarouselController');



//后台修改密码
Route::get('/admin/user/xpw/{id}','Admin\UserController@xpw'); //1:1
Route::post('/admin/user/x1pw/{id}','Admin\UserController@x1pw'); //1:1
//后台用户管理
Route::resource('/admin/user','Admin\UserController');


// 后台友情链接管理路由
Route::resource('admin/link','Admin\LinkController');
// 后台广告管理路由
Route::resource('admin/adver','Admin\AdverController');


