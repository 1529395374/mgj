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

Route::get('/','Home\IndexController@index');
Route::get('/admin/cate/isedit/{id}','Admin\CateController@isedit');
Route::post('/admin/cate/issave/{id}','Admin\CateController@issave');
Route::resource('/admin/cate','Admin\CateController');
Route::resource('/admin/goods','Admin\GoodsController');



