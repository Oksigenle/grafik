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

Route::get('/home', 'PendaftarController@index')->name('home'); 
Route::get('/pendaftarLoket', 'PendaftarController@pendaftar');
Route::get('/byDeposit', 'PendaftarController@byDeposit');

//deposit manual
Route::get('/manualApprove', 'PendaftarController@manualApprove');
Route::get('/manualReject', 'PendaftarController@manualReject');
//deposit otomatis
Route::get('/otomatisApprove', 'PendaftarController@otomatisApprove');
Route::get('/otomatisReject', 'PendaftarController@otomatisReject');


Route::get('/getChart', 'PendaftarController@getChart');
 
