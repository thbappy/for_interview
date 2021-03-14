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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('information/create', 'HomeController@create')->name('information.create');
Route::post('information/store', 'HomeController@store')->name('information.store');
Route::get('information/edit/{id}', 'HomeController@edit')->name('information.edit');
Route::post('information/update/{id}', 'HomeController@update')->name('information.update');
Route::delete('information/delete/{id}', 'HomeController@destroy')->name('information.delete');
