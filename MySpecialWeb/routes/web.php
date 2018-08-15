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

Route::get('test_view', function(){
		return view('admin.theloai.danhsach');
});


Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'theloai'], function(){
		Route::get('danhsach', 'TheLoaiController@getDanhSach');
		Route::get('sua', 'TheLoaiController@getSua');
		Route::get('them', 'TheLoaiController@getThem');
	});

	Route::group(['prefix'=>'loaitin'], function(){
		Route::get('danhsach', 'LoaiTinController@getDanhSach');
		Route::get('sua', 'LoaiTinController@getSua');
		Route::get('them', 'LoaiTinController@getThem');
	});

	Route::group(['prefix'=>'comment'], function(){
		Route::get('danhsach', 'CommentController@getDanhSach');
		Route::get('sua', 'CommentController@getSua');
		Route::get('them', 'CommentController@getThem');
	});

	Route::group(['prefix'=>'tintuc'], function(){
		Route::get('danhsach', 'TinTucController@getDanhSach');
		Route::get('sua', 'TinTucController@getSua');
		Route::get('them', 'TinTucController@getThem');
	});

	Route::group(['prefix'=>'user'], function(){
		Route::get('danhsach', 'UserController@getDanhSach');
		Route::get('sua', 'UserController@getSua');
		Route::get('them', 'UserController@getThem');
	});
});