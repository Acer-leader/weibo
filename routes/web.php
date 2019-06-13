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
Route::get('/', 'StaticPagesController@home')->name('home');
//帮助
Route::get('/help', 'StaticPagesController@help')->name('help');
//
Route::get('/about', 'StaticPagesController@about')->name('about');
//注册页面
Route::get('/signup', 'UsersController@create')->name('users.signup');
//资源路由  资源名称  资源控制器
Route::resource('users','UsersController');

Route::post('users','UsersController@store')->name('users.store');