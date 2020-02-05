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
Route::middleware(['auth:api'])->Group(function(){
    //Dokter
    Route::get('/dokter','Api\DokterController@index');
    Route::post('/dokter','Api\DokterController@store');
    Route::get('/dokter/{id}','Api\DokterController@show');
    Route::post('/dokter/{id}','Api\DokterController@update');
    Route::delete('/dokter/{id}','Api\DokterController@destroy');
});


//Ruangan
Route::get('/ruangan','Api\RuanganController@index');
Route::post('/ruangan','Api\RuanganController@store');
Route::get('/ruangan/{id}','Api\RuanganController@show');
Route::post('/ruangan/{id}','Api\RuanganController@update');
Route::delete('/ruangan/{id}','Api\RuanganController@destroy');

//Operasi
Route::get('/operasi','Api\OperasiController@index');
Route::post('/operasi','Api\OperasiController@store');
Route::get('/operasi/{id}','Api\OperasiController@show');
Route::post('/operasi/{id}','Api\OperasiController@update');
Route::delete('/operasi/{id}','Api\OperasiController@destroy');

//Pasien
Route::get('/pasien','Api\PasienController@index');
Route::post('/pasien','Api\PasienController@store');
Route::get('/pasien/{id}','Api\PasienController@show');
Route::post('/pasien/{id}','Api\PasienController@update');
Route::delete('/pasien/{id}','Api\PasienController@destroy');

//User
Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');