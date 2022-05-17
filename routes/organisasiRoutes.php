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
	Route::group(['prefix' => 'organisasi'], function() {
		Route::get('/', 'Organisasi\TestController@index');
	});

	Route::group(['middleware' => ['portalAuth.view']], function() {
		Route::group(['prefix' => 'organisasi/struktur_organisasi'], function() {
			Route::get('/', 'Organisasi\CStrukturOrg@index');
			Route::post('/get_unit', 'Organisasi\CStrukturOrg@get_unit');
			Route::post('/get_subunit', 'Organisasi\CStrukturOrg@get_subunit');
			Route::post('/get_divisi', 'Organisasi\CStrukturOrg@get_divisi');
			Route::post('/get_section', 'Organisasi\CStrukturOrg@get_section');
			Route::post('/search_dt', 'Organisasi\CStrukturOrg@search_dt');
			Route::post('/show_dtl', 'Organisasi\CStrukturOrg@show_dtl');
		});

		Route::group(['prefix' => 'organisasi/eksekutif_boc'], function() {
			Route::get('/', 'Organisasi\CEksekutifBoc@index');
			Route::post('/search_dt', 'Organisasi\CEksekutifBoc@search_dt');
			Route::post('/show_dtl', 'Organisasi\CEksekutifBoc@show_dtl');
        });
        
        Route::group(['prefix' => 'organisasi/eksekutif_bod'], function() {
			Route::get('/', 'Organisasi\CEksekutifBod@index');
			Route::post('/search_dt', 'Organisasi\CEksekutifBod@search_dt');
			Route::post('/show_dtl', 'Organisasi\CEksekutifBod@show_dtl');
		});
	});

	Route::group(['middleware' => ['portalAuth.save']], function() {
		Route::group(['prefix' => 'organisasi/struktur_organisasi'], function() {
			Route::post('/save', 'Organisasi\CStrukturOrg@save');
		});

		Route::group(['prefix' => 'organisasi/eksekutif_boc'], function() {
			Route::post('/save', 'Organisasi\CEksekutifBoc@save');
        });
        
        Route::group(['prefix' => 'organisasi/eksekutif_bod'], function() {
			Route::post('/save', 'Organisasi\CEksekutifBod@save');
		});
	});

	Route::group(['middleware' => ['portalAuth.delete']], function() {
		Route::group(['prefix' => 'organisasi/struktur_organisasi'], function() {
			Route::post('/delete_dt', 'Organisasi\CStrukturOrg@delete_dt');
        });
        
        Route::group(['prefix' => 'organisasi/eksekutif_boc'], function() {
			Route::post('/delete_dt', 'Organisasi\CEksekutifBoc@delete_dt');
        });
        
        Route::group(['prefix' => 'organisasi/eksekutif_bod'], function() {
			Route::post('/delete_dt', 'Organisasi\CEksekutifBod@delete_dt');
		});
	});
});