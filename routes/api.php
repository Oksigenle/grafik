<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 


Route::post('/pendaftar/loket', 'Api\PendaftaranLoketApi@store');
Route::get('/pendaftar', 'Api\PendaftaranLoketApi@index');
Route::post('/rekening', 'Api\PendaftaranLoketApi@rekening');

