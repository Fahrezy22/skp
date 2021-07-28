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


Route::prefix('/')->group(function () {
    route::get('/', 'AuthController@index')->name('login');
    route::post('/', 'AuthController@login');
    route::get('/register','AuthController@register')->name('register');
    route::post('/register','AuthController@register_p');

});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });

    Route::prefix('pegawai')->group(function () {
        Route::get('/', 'PegawaiController@index')->name('pegawai');
        Route::post('/', 'PegawaiController@store');
        Route::post('/import', 'PegawaiController@import');
        Route::post('/edit/{id:id}', 'PegawaiController@update');
        Route::get('/delete/{id:id}', 'PegawaiController@destroy');
    });
    Route::prefix('penilai')->group(function () {
        Route::get('/', 'PenilaiController@index')->name('penilai');
        Route::post('/', 'PenilaiController@store');
        Route::post('/import', 'PenilaiController@import_penilai');
        Route::post('/import/atasan', 'PenilaiController@import_atasan');
        Route::post('/edit/{id:id}', 'PenilaiController@update');
        Route::get('/delete/{id:id}', 'PenilaiController@delete_penilai');
        Route::post('/add', 'PenilaiController@add_atasan');
        Route::post('/edit/atasan/{id:id}', 'PenilaiController@update_a');
    });

    Route::resource('skp','SkpController')->except('create','show','update','destroy');
    Route::post('skp/Update', 'SkpController@update')->name('skp.update');
    Route::post('skp/Destroy', 'SkpController@destroy')->name('skp.destroy');

    Route::get('logout', 'AuthController@logout')->name('logout');
});
