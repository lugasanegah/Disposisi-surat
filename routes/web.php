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

Route::get('send', 'mailController@send');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/surat', 'SuratController@index')->name('admin.surat.daftar')->middleware('role:super');

Route::get('admin/log', 'LogSuratController@index')->name('admin.logSurat.daftar')->middleware('role:super');