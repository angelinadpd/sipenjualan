<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/default', function () {
    return view('layout.default');
});

//LAPORAN
Route::get('/laporanpembelian', function () {
  return view('laporanpembelian.index');
});



Route::group(['middleware' => ['web']],function () {
	Route::resource('barang', 'barangController');
	Route::get('barang', ['as' => 'barang', 'uses' => 'barangController@index']);

	Route::resource('pembeli', 'pembeliController');
	Route::get('pembeli', ['as' => 'pembeli', 'uses' => 'pembeliController@index']);

	Route::resource('supplier', 'supplierController');
	Route::get('supplier', ['as' => 'supplier', 'uses' => 'supplierController@index']);

	Route::resource('pesanbarang', 'pesanbarangController');
	Route::get('pesanbarang', ['as' => 'pesanbarang', 'uses' => 'pesanbarangController@index']);

	Route::resource('realisasi', 'realisasiController');
	Route::get('realisasi', ['as' => 'realisasi', 'uses' => 'realisasiController@index']);

	Route::resource('penjualan', 'penjualanController');
	Route::get('penjualan', ['as' => 'penjualan', 'uses' => 'penjualanController@index']);

	Route::resource('laporanpembelian', 'laporanpembelianController');
	Route::get('/indexharian', ['as' => 'laporanpembelian', 'uses' => 'laporanpembelianController@indexharian']);
	Route::get('/listharian/{laporanpembelian}', ['as' => 'laporanpembelian', 'uses' => 'laporanpembelianController@listharian']);
	
});  
Route::auth();

Route::get('/home', 'HomeController@index');
