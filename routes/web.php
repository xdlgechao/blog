<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台登录
Route::get('/admin/login','Admin\LoginController@login');
//添加
Route::get('/admin/crypt','Admin\LoginController@crypt');
//执行添加
Route::post('/admin/docrypt','Admin\LoginController@docrypt');
//显示验证码
Route::get('/admin/yzm','Admin\LoginController@yzm');
//登录
Route::post('/admin/dologin','Admin\LoginController@dologin');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'login.admin'],function(){
	//后台首页
	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	//添加用户
	Route::get('add','IndexController@add');
	//执行添加
	// Route::get('doadd','IndexController@doadd');
	//退出
	Route::get('logout','IndexController@logout');
});

Route::get('/admin/doadd','IndexController@doadd');

