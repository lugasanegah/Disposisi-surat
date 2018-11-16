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

Route::group(['prefix' => 'admin'], function(){

	Route::resource('surat', 'SuratController');

	Route::resource('log', 'LogSuratController')->middleware('role:super');

	Route::get('review/{id}', 'SuratController@addReview')->name('admin.review')->middleware('role:reviewer');

	Route::post('review/{id}', 'SuratController@saveReview')->name('admin.saveReview')->middleware('role:reviewer');

	Route::get('disposisi/{id}', 'SuratController@addDisposisi')->name('admin.disposisi');

	Route::post('disposisi/{id}', 'SuratController@saveDisposisi')->name('admin.saveDisposisi');
});

