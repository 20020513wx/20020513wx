<?php

use Illuminate\Support\Facades\Route;

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


//品牌
Route::prefix('/brand')->middleware('auth')->group(function(){

	
	Route::get('add','Admin\BrandController@add');
	Route::post('addDo','Admin\BrandController@addDo');
	//Route::get('/','Admin\BrandController@brand');
	Route::any('/','Admin\BrandController@brand');
	Route::get('delete/{id}','Admin\BrandController@delete');
	Route::get('edit/{id}','Admin\BrandController@edit');
	Route::post('update/{id}','Admin\BrandController@update');
});
//分类
Route::prefix('/category')->middleware('auth')->group(function(){
	Route::get('add','Admin\CategoryController@add');
	Route::get('/','Admin\CategoryController@category');
	Route::post('addDo','Admin\CategoryController@addDo');
	Route::get('delete/{id}','Admin\CategoryController@delete');
	Route::get('edit/{id}','Admin\CategoryController@edit');
	Route::post('update/{id}','Admin\CategoryController@update');
});
//商品
Route::prefix('/goods')->middleware('auth')->group(function(){
	Route::get('create','Admin\GoodsController@create');
	Route::get('/','Admin\GoodsController@index');
	Route::post('store','Admin\GoodsController@store');
	Route::get('edit/{id}','Admin\GoodsController@edit');
	Route::post('update/{id}','Admin\GoodsController@update');
	Route::get('destroy/{id}','Admin\GoodsController@destroy');
});
//管理员
Route::prefix('/admin')->middleware('auth')->group(function(){
	Route::get('create','Admin\AdminController@create');
	Route::get('/','Admin\AdminController@index');
	Route::post('store','Admin\AdminController@store');
	Route::get('edit/{id}','Admin\AdminController@edit');
	Route::post('update/{id}','Admin\AdminController@update');
	Route::get('destroy/{id}','Admin\AdminController@destroy');
});
//登录
Route::view('/login','admin.login');
Route::post('/logindo','Admin\LoginController@logindo');
Route::get('/end','Admin\LoginController@end');
//测试得到cookie
Route::get('/test','Admin\LoginController@test');

//友情链接
Route::prefix('/web')->middleware('auth')->group(function(){
	Route::get('/','Admin\WebController@index');
	Route::get('create','Admin\WebController@create');
	Route::post('store','Admin\WebController@store');
	Route::get('edit/{id}','Admin\WebController@edit');
	Route::get('destroy/{id}','Admin\WebController@destroy');
	Route::post('update/{id}','Admin\WebController@update');
});

//cookie
//设置cookie
Route::get('/setcookie','IndexController@setcookie');
//获取cookie
Route::get('/getcookie','IndexController@getcookie');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
