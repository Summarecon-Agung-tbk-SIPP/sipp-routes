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
	Route::group(['prefix' => 'vouchermall'], function() {
		Route::get('/', 'Vouchermall\TestController@index');
	});

	/* === VIEW ROUTING === */
	Route::group(['middleware' => ['portalAuth.view']], function() {
		
		/* === View Master Voucher === */
		Route::group(['prefix' => 'vchmall/cVoucherMall'], function() {
			Route::get('/', 'Vouchermall\cVoucherMall@index');		
			Route::post('/search_dt', 'Vouchermall\cVoucherMall@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cVoucherMall@get_voucher');			
		});

		/* === View Proses Terima Voucher === */
		Route::group(['prefix' => 'vchmall/cTerimaVoucher'], function() {
			Route::get('/', 'Vouchermall\cTerimaVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cTerimaVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cTerimaVoucher@get_voucher');
			Route::post('/search_data_voucher', 'Vouchermall\cTerimaVoucher@search_data_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cTerimaVoucher@show_dtl');			
		});

		/* === View Proses Pengajuan Voucher === */
		Route::group(['prefix' => 'vchmall/cPengajuanVoucher'], function() {
			Route::get('/', 'Vouchermall\cPengajuanVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cPengajuanVoucher@search_dt');	
			Route::post('/get_voucher', 'Vouchermall\cPengajuanVoucher@get_voucher');	
			Route::post('/show_dtl', 'Vouchermall\cPengajuanVoucher@show_dtl');
			Route::post('/search_data_voucher', 'Vouchermall\cPengajuanVoucher@search_data_voucher');		
		});

		/* === View Proses Approval Voucher === */
		Route::group(['prefix' => 'vchmall/cApproveVoucher'], function() {
			Route::get('/', 'Vouchermall\cApproveVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cApproveVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cApproveVoucher@get_voucher');		
			Route::post('/show_kabag', 'Vouchermall\cApproveVoucher@show_kabag');
			Route::post('/show_approved', 'Vouchermall\cApproveVoucher@show_approved');	
			Route::post('/show_canceled', 'Vouchermall\cApproveVoucher@show_canceled');			
			Route::post('/show_detail', 'Vouchermall\cApproveVoucher@show_detail');	
		});

		/* === View Proses Pengeluaran Voucher === */
		Route::group(['prefix' => 'vchmall/cPengeluaranVoucher'], function() {
			Route::get('/', 'Vouchermall\cPengeluaranVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cPengeluaranVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cPengeluaranVoucher@get_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cPengeluaranVoucher@show_dtl');			
			Route::post('/search_pengajuan', 'Vouchermall\cPengeluaranVoucher@search_pengajuan');
			Route::post('/refresh_pengajuan', 'Vouchermall\cPengeluaranVoucher@refresh_pengajuan');	
			Route::post('/search_data_voucher', 'Vouchermall\cPengeluaranVoucher@search_data_voucher');		
		});

		/* === View Proses Cek List Terima Voucher === */
		Route::group(['prefix' => 'vchmall/cCeklistTerimaVoucher'], function() {
			Route::get('/', 'Vouchermall\cCeklistTerimaVoucher@index');		
			Route::post('/get_voucher', 'Vouchermall\cCeklistTerimaVoucher@get_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cCeklistTerimaVoucher@show_dtl');
			Route::post('/search_pengajuan', 'Vouchermall\cCeklistTerimaVoucher@search_pengajuan');
			Route::post('/refresh_pengajuan', 'Vouchermall\cCeklistTerimaVoucher@refresh_pengajuan');			
		});

		/* === View Proses Penjualan Voucher === */
		Route::group(['prefix' => 'vchmall/cPenjualanVoucher'], function() {
			Route::get('/', 'Vouchermall\cPenjualanVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cPenjualanVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cPenjualanVoucher@get_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cPenjualanVoucher@show_dtl');	
			Route::post('/get_cara_bayar', 'Vouchermall\cPenjualanVoucher@get_cara_bayar');		
			Route::post('/search_data_voucher', 'Vouchermall\cPenjualanVoucher@search_data_voucher');
			Route::post('/search_tenant', 'Vouchermall\cPenjualanVoucher@search_tenant');
		});

		/* === View Proses Pembagian Voucher === */
		Route::group(['prefix' => 'vchmall/cPembagianVoucher'], function() {
			Route::get('/', 'Vouchermall\cPembagianVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cPembagianVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cPembagianVoucher@get_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cPembagianVoucher@show_dtl');	
			Route::post('/search_data_voucher', 'Vouchermall\cPembagianVoucher@search_data_voucher');		
			Route::post('/get_data_onhand', 'Vouchermall\cPembagianVoucher@get_data_onhand');	
		});

		/* === View Proses Pencairan Voucher === */
		Route::group(['prefix' => 'vchmall/cPencairanVoucher'], function() {
			Route::get('/', 'Vouchermall\cPencairanVoucher@index');		
			Route::post('/search_dt', 'Vouchermall\cPencairanVoucher@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cPencairanVoucher@get_voucher');		
			Route::post('/show_dtl', 'Vouchermall\cPencairanVoucher@show_dtl');
			Route::post('/search_data_voucher', 'Vouchermall\cPencairanVoucher@search_data_voucher');
			Route::post('/search_penjualan', 'Vouchermall\cPencairanVoucher@search_penjualan');			
		});

		/* === View Dashboard Finance Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cDashboardFa'], function() {
			Route::get('/', 'Vouchermall\cDashboardFa@index');		
			Route::post('/search_dt', 'Vouchermall\cDashboardFa@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cDashboardFa@get_voucher');
		});

		/* === View Laporan Penerimaan Voucher Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cLapTerima'], function() {
			Route::get('/', 'Vouchermall\cLapTerima@index');		
			Route::post('/search_dt', 'Vouchermall\cLapTerima@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cLapTerima@get_voucher');
		});

		/* === View Laporan Pengeluaran Voucher Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cLapKeluar'], function() {
			Route::get('/', 'Vouchermall\cLapKeluar@index');		
			Route::post('/search_dt', 'Vouchermall\cLapKeluar@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cLapKeluar@get_voucher');
		});

		/* === View Laporan Pengajuan Voucher Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cLapPengajuan'], function() {
			Route::get('/', 'Vouchermall\cLapPengajuan@index');		
			Route::post('/search_dt', 'Vouchermall\cLapPengajuan@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cLapPengajuan@get_voucher');
		});

		/* === View Laporan Pembagian Voucher Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cLapPembagian'], function() {
			Route::get('/', 'Vouchermall\cLapPembagian@index');		
			Route::post('/search_dt', 'Vouchermall\cLapPembagian@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cLapPembagian@get_voucher');
		});

		/* === View Laporan Pencairan Voucher Mall === */
		Route::group(['prefix' => 'vchmall/cLapPencairan'], function() {
			Route::get('/', 'Vouchermall\cLapPencairan@index');		
			Route::post('/search_dt', 'Vouchermall\cLapPencairan@search_dt');
			Route::post('/get_voucher', 'Vouchermall\cLapPencairan@get_voucher');
		});
	});

	/* === SAVE ROUTING === */
	Route::group(['middleware' => ['portalAuth.save']], function() {

		/* === Save Master Voucher === */
		Route::group(['prefix' => 'vchmall/cVoucherMall'], function() {
			Route::post('/save', 'Vouchermall\cVoucherMall@save');
		});

		/* === Save Proses Terima Voucher === */
		Route::group(['prefix' => 'vchmall/cTerimaVoucher'], function() {
			Route::post('/save', 'Vouchermall\cTerimaVoucher@save');
			Route::post('/closing', 'Vouchermall\cTerimaVoucher@closing');
		});

		/* === Save Proses Pengajuan Voucher === */
		Route::group(['prefix' => 'vchmall/cPengajuanVoucher'], function() {
			Route::post('/save', 'Vouchermall\cPengajuanVoucher@save');
		});
		
		/* === Save Proses Approval Voucher === */
		Route::group(['prefix' => 'vchmall/cApproveVoucher'], function() {
			Route::post('/save', 'Vouchermall\cApproveVoucher@save');
		});

		/* === Save Proses Pengeluaran Voucher === */
		Route::group(['prefix' => 'vchmall/cPengeluaranVoucher'], function() {
			Route::post('/save', 'Vouchermall\cPengeluaranVoucher@save');
			Route::post('/closing', 'Vouchermall\cPengeluaranVoucher@closing');
		});

		/* === Save Proses Cek List Terima Voucher === */
		Route::group(['prefix' => 'vchmall/cCeklistTerimaVoucher'], function() {
			Route::post('/save', 'Vouchermall\cCeklistTerimaVoucher@save');
		});

		/* === Save Proses Penjualan Voucher === */
		Route::group(['prefix' => 'vchmall/cPenjualanVoucher'], function() {
			Route::post('/save', 'Vouchermall\cPenjualanVoucher@save');
			Route::post('/closing', 'Vouchermall\cPenjualanVoucher@closing');
		});

		/* === Save Proses Pembagian Voucher === */
		Route::group(['prefix' => 'vchmall/cPembagianVoucher'], function() {
			Route::post('/save', 'Vouchermall\cPembagianVoucher@save');
			Route::post('/closing', 'Vouchermall\cPembagianVoucher@closing');
		});

		/* === Save Proses Pencairan Voucher === */
		Route::group(['prefix' => 'vchmall/cPencairanVoucher'], function() {
			Route::post('/save', 'Vouchermall\cPencairanVoucher@save');
			Route::post('/closing', 'Vouchermall\cPencairanVoucher@closing');
		});
	});

	/* === DELETE ROUTING === */
	Route::group(['middleware' => ['portalAuth.delete']], function() {
		
		/* === Delete Master Voucher === */
		Route::group(['prefix' => 'vchmall/cVoucherMall'], function() {
			Route::post('/delete_dt', 'Vouchermall\cVoucherMall@delete_dt');
        });

		/* === Delete Proses Terima Voucher === */
		Route::group(['prefix' => 'vchmall/cTerimaVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cTerimaVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cTerimaVoucher@delete_detail');
        });

		/* === Delete Proses Pengajuan Voucher === */
		Route::group(['prefix' => 'vchmall/cPengajuanVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cPengajuanVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cPengajuanVoucher@delete_detail');
        });

		/* === Delete Proses Pengeluaran Voucher === */
		Route::group(['prefix' => 'vchmall/cPengeluaranVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cPengeluaranVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cPengeluaranVoucher@delete_detail');
		});

		/* === Delete Proses Penjualan Voucher === */
		Route::group(['prefix' => 'vchmall/cPenjualanVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cPenjualanVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cPenjualanVoucher@delete_detail');
		});

		/* === Delete Proses Pembagian Voucher === */
		Route::group(['prefix' => 'vchmall/cPembagianVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cPembagianVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cPembagianVoucher@delete_detail');
		});

		/* === Delete Proses Pencairan Voucher === */
		Route::group(['prefix' => 'vchmall/cPencairanVoucher'], function() {
			Route::post('/delete_dt', 'Vouchermall\cPencairanVoucher@delete_dt');
			Route::post('/delete_detail', 'Vouchermall\cPencairanVoucher@delete_detail');
		});
	});
});