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

//主页
Route::get('', 'StaticPagesController@home')->name('home');
//帮助
Route::get('/help', 'StaticPagesController@help')->name('help');
//
Route::get('/about', 'StaticPagesController@about')->name('about');
//注册页面
Route::get('/signup', 'UsersController@create')->name('signup');
/**
新增的 resource 方法将遵从 RESTful 架构为用户资源生成路由。该方法接收两个参数，第一个参数
为资源名称，第二个参数为控制器名称。
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
**/
Route::resource('users','UsersController');

//资源表单提交存储数据到数据库信息提醒
Route::post('store','UsersController@store')->name('store');
//创建 会话控制 显示登录页面
Route::get('login','SessionsController@create')->name('login');
//创建会话
Route::post('login','SessionsController@store')->name('login');
//删除会话
Route::delete('logout','SessionsController@destroy')->name('logout');
