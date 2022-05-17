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
		Route::group(['prefix' => 'dw/dashboard'], function() {
			Route::get('/', 'Dw\CDashboard@index');
			Route::post('/rekap_pesanan', 'Dw\CDashboard@rekap_pesanan');
			Route::post('/show_pesanan', 'Dw\CDashboard@show_pesanan');
			Route::post('/detail_pesanan', 'Dw\CDashboard@detail_pesanan');
		});

		Route::group(['prefix' => 'dw/item'], function() {
			Route::get('/', 'Dw\CItem@index');
			Route::post('/search', 'Dw\CItem@search');
			Route::post('/show_varian_1', 'Dw\CItem@show_varian_1');
			Route::post('/show_varian_2', 'Dw\CItem@show_varian_2');
			Route::post('/show_menu_varian', 'Dw\CItem@show_menu_varian');
			Route::post('/show_pilihan', 'Dw\CItem@show_pilihan');
			Route::post('/list_optional', 'Dw\CItem@list_optional');
			Route::post('/show_optional', 'Dw\CItem@show_optional');
		});

		Route::group(['prefix' => 'dw/kategori'], function() {
			Route::get('/', 'Dw\CKategori@index');
			Route::post('/show_kategori', 'Dw\CKategori@show_kategori');
		});

		Route::group(['prefix' => 'dw/optional'], function() {
			Route::get('/', 'Dw\COptional@index');
			Route::post('/show_option_group', 'Dw\COptional@show_option_group');
			Route::post('/show_option', 'Dw\COptional@show_option');
		});

		Route::group(['prefix' => 'dw/pesanan'], function() {
			Route::get('/', 'Dw\CPesanan@index');
			Route::post('/show_pesanan', 'Dw\CPesanan@show_pesanan');
			Route::post('/detail_pesanan', 'Dw\CPesanan@detail_pesanan');
		});

		Route::group(['prefix' => 'dw/profil'], function() {
			Route::get('/', 'Dw\CProfil@index');
			Route::post('/search', 'Dw\CProfil@search');
		});
	});

	Route::group(['middleware' => ['portalAuth.save']], function() {
		Route::group(['prefix' => 'dw/item'], function() {
			Route::post('/save', 'Dw\CItem@save');
			Route::post('/save_varian', 'Dw\CItem@save_varian');
			Route::post('/upload_gambar', 'Dw\CItem@upload_gambar');
			Route::post('/link_to_optional', 'Dw\CItem@link_to_optional');
		});

		Route::group(['prefix' => 'dw/kategori'], function() {
			Route::post('/save', 'Dw\CKategori@save');
		});

		Route::group(['prefix' => 'dw/optional'], function() {
			Route::post('/save', 'Dw\COptional@save');
			Route::post('/save_option', 'Dw\COptional@save_option');
		});

		Route::group(['prefix' => 'dw/profil'], function() {
			Route::post('/save', 'Dw\CProfil@save');
		});

		Route::group(['prefix' => 'dw/pesanan'], function() {
			Route::post('/process_pesanan', 'Dw\CPesanan@process_pesanan');
			Route::post('/batal_pesanan', 'Dw\CPesanan@batal_pesanan');
		});
	});

	Route::group(['middleware' => ['portalAuth.delete']], function() {
		Route::group(['prefix' => 'dw/item'], function() {
			Route::post('/delete_dt', 'Dw\CItem@delete_dt');
			Route::post('/delete_varian_1', 'Dw\CItem@delete_varian_1');
			Route::post('/delete_varian_2', 'Dw\CItem@delete_varian_2');
			Route::post('/delete_optional', 'Dw\CItem@delete_optional');
		});

		Route::group(['prefix' => 'dw/kategori'], function() {
			Route::post('/delete_dt', 'Dw\CKategori@delete_dt');
		});

		Route::group(['prefix' => 'dw/optional'], function() {
			Route::post('/delete_dt', 'Dw\COptional@delete_dt');
			Route::post('/delete_option', 'Dw\COptional@delete_option');
		});
	});
});