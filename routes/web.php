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

Route::get('base', function () {
    return view('base.index');
});

//文章首页
Route::get('/posts', '\App\Http\Controllers\PostController@index');

//文章创建
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
//文章处理
Route::post('/posts', '\App\Http\Controllers\PostController@store');

//文章详情
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

//编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
//编辑逻辑
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');

//删除文章
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
//
Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');
