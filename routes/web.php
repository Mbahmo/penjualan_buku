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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('homebaru');


Route::get('/buku', 'BukuController@index');
Route::post('/buku/simpan', 'BukuController@store');
Route::post('/buku/edit', 'BukuController@update');
Route::get('buku/delete/{id}', 'BukuController@destroy');

Route::get('/supplier', 'SupplierController@index');
Route::post('/supplier/simpan', 'SupplierController@store');
Route::post('/supplier/edit', 'SupplierController@update');
Route::get('/supplier/delete/{id}', 'SupplierController@destroy');

Route::get('/transaksi', 'TransaksiController@index');
Route::post('/transaksi/simpan', 'TransaksiController@store');
Route::get('/transaksi/delete/{id}', 'TransaksiController@destroy');
Route::get('/transaksi/checkout', 'TransaksiController@checkout');





