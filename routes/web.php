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

Route::get('/sys/autologin/{encryption}', 'Sys\SysController@autologin');
Route::post('/sys/ganti_unit', 'Sys\SysController@ganti_unit');
Route::post('/sys/search_unit', 'Sys\SysController@search_unit');
Route::get('signin', 'Sys\SysController@signin');
Route::post('signin_process', 'Sys\SysController@signin_process');
Route::get('signout', 'Sys\SysController@signout');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['portalAuth']], function() {
	Route::group(['middleware' => ['portalAuth.view']], function() {
		Route::group(['prefix' => 'sys/user'], function() {
			Route::get('/', 'Sys\CUser@index');
			Route::post('/search_dt', 'Sys\CUser@search_dt');
			Route::post('/show_role', 'Sys\CUser@show_role');
			Route::post('/show_unit', 'Sys\CUser@show_unit');
		});

		Route::group(['prefix' => 'sys/modul'], function() {
			Route::get('/', 'Sys\CModul@index');
			Route::post('/search_dt', 'Sys\CModul@search_dt');
		});

		Route::group(['prefix' => 'sys/role'], function() {
			Route::get('/', 'Sys\CRole@index');
			Route::post('/search_dt', 'Sys\CRole@search_dt');
			Route::post('/show_modul', 'Sys\CRole@show_modul');
		});
	});

	Route::group(['middleware' => ['portalAuth.save']], function() {
		Route::group(['prefix' => 'sys/user'], function() {
			Route::post('/save', 'Sys\CUser@save');
		});

		Route::group(['prefix' => 'sys/modul'], function() {
			Route::post('/save', 'Sys\CModul@save');
		});

		Route::group(['prefix' => 'sys/role'], function() {
			Route::post('/save', 'Sys\CRole@save');
		});
	});

	Route::group(['middleware' => ['portalAuth.delete']], function() {
		Route::group(['prefix' => 'sys/user'], function() {
			Route::post('/delete_role', 'Sys\CUser@delete_role');
			Route::post('/delete_unit', 'Sys\CUser@delete_unit');
		});

		Route::group(['prefix' => 'sys/role'], function() {
			Route::post('/delete_modul', 'Sys\CRole@delete_modul');
		});
	});
});