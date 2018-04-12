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

//后台命名空间分组
/*Route::namespace('Admin')->group(function () {
    Route::get('admin/check/code/{code?}','AdminController@check');
});*/


//直接调用group 传入使用的各种参数。最灵活的一种
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function () {

    Route::any('login','AdminController@login');
    Route::get('quit', 'AdminController@quit');

});

//为index info 分配中间件
Route::group(['middleware'=>['admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function () {

    Route::get('index','IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::any('pass', 'IndexController@pass');

    //资源路由 一条路由控制多条路由
    //php artisan make:controller CateGoryController --resource 帮助我们生成好资源路由控制器
    Route::resource('category','CateGoryController');
    Route::resource('article','ArticleController');

    Route::post('category/changeOrder', 'CateGoryController@changeOrder');
});

