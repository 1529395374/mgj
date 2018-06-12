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
Route::get('/admin/login',function(){return view('/admin/login/index');});
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

Route::get('/home/register/jihuo','Home\RegisterController@jihuo');		// 激活账号

Route::get('/home/register/tel','Home\RegisterController@tel_code');	// 验证码
Route::resource('/home/register','Home\RegisterController');			// 注册create


Route::post('/home/login/dologin','Home\LoginController@dologin'); //1:1 	//前台登录
Route::get('/home/login',function(){return view('/home/login/index');});	//加载前台登录页面
Route::get('/home/login/logout','Home\LoginController@logout'); 			//1:1//前台退出
Route::resource('/home/info','Home\UserinfoController');					//个人中心
//前台收货地址路由
Route::resource('/home/address','Home\AddressController');
//设置默认地址 路由
Route::get('/home/address/dafault/{id}','Home\AddressController@dafault');
Route::post('/home/userinfo/uploads','Home\UserinfoController@uploads'); 			//头像上传












// 后台显示添加子类表单
Route::get('/admin/cate/isedit/{id}','Admin\CateController@isedit');
// 后台执行添加子类
Route::post('/admin/cate/issave/{id}','Admin\CateController@issave');
// 后台分类管理
Route::resource('/admin/cate','Admin\CateController');
// 后台商品管理
Route::resource('/admin/goods','Admin\GoodsController');
// 前台商品搜索
Route::get('/home/goods/search','Home\GoodsController@search');
// 前台商品管理
Route::controller('/home/goods','Home\GoodsController');
// 前台订单
Route::controller('/home/order','Home\OrderController');



















//后台文章管理路由
Route::resource('/admin/articles','Admin\ArticlesController');
//前台文章详情页
Route::get('/home/articles/detail','Admin\ArticlesController@detail');
//后台轮播ajax上传
Route::post('/admin/carousel/test1','Admin\CarouselController@test1');
//后台轮播管理路由
Route::resource('/admin/carousel','Admin\CarouselController');
//前台购物车
Route::resource('/home/car','Home\CarController');














// 后台友情链接管理路由
Route::resource('admin/link','Admin\LinkController');
// 后台广告管理路由
Route::resource('admin/adver','Admin\AdverController');





