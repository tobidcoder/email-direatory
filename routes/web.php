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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'UserdataController@index')->name('index');
Route::post('/', 'UserdataController@store')->name('store');
Route::get('{id}/edit', 'UserdataController@edit')->name('edit');
Route::PUT('{id}', 'UserdataController@update')->name('update');
Route::DELETE('{id}', 'UserdataController@destroy')->name('destroy');