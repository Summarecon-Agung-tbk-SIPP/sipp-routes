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

Auth::routes();

Route::group(['middleware' => ['portalAuth']], function() {
	Route::group(['middleware' => ['portalAuth.view']], function() {
		Route::group(['prefix' => 'pp/periode'], function() {
			Route::get('/', 'Pp\CPeriode@index');
			Route::post('/search_dt', 'Pp\CPeriode@search_dt');
		});

		Route::group(['prefix' => 'pp/peserta'], function() {
			Route::get('/', 'Pp\CPeserta@index');
			Route::post('/search_dt', 'Pp\CPeserta@search_dt');
			Route::post('/send_email', 'Pp\CPeserta@send_email');
		});

		Route::group(['prefix' => 'pp/verifikasi'], function() {
			Route::get('/', 'Pp\CVerifikasi@index');
			Route::post('/register_to_zoom', 'Pp\CVerifikasi@register_to_zoom');
			Route::post('/search_dt', 'Pp\CVerifikasi@search_dt');
		});
	});

	Route::group(['middleware' => ['portalAuth.save']], function() {
		Route::group(['prefix' => 'pp/periode'], function() {
			Route::post('/save', 'Pp\CPeriode@save');
		});

		Route::group(['prefix' => 'pp/peserta'], function() {
			Route::post('/save', 'Pp\CPeserta@save');
		});

		Route::group(['prefix' => 'pp/verifikasi'], function() {
			Route::post('/save', 'Pp\CVerifikasi@save');
			Route::post('/send_email', 'Pp\CVerifikasi@send_email');
		});
	});

	Route::group(['middleware' => ['portalAuth.delete']], function() {
		Route::group(['prefix' => 'pp/peserta'], function() {
			Route::post('/delete_dt', 'Pp\CPeserta@delete_dt');
		});
	});
});

Route::group(['prefix' => 'pp/registrasi/{kd_unit}/{kd_lokasi}/{periode_id}/{peserta_id}'], function() {
	Route::get('/', 'Pp\CRegistrasi@index');
});

Route::group(['prefix' => 'pp/registrasi_submit'], function() {
	Route::post('/', 'Pp\CRegistrasi@submit');
});

Route::group(['prefix' => 'pp/attendance'], function() {
	Route::get('/', 'Pp\CAttendance@index');
});