<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/production', 'HomeController@production')->name('production');
Route::get('/about','HomeController@about')->name('about');
Route::get('/center','HomeController@center')->name('center');
Route::get('/delete/{id}','HomeController@delete')->name('delete');
Route::get('/filter/{id}','HomeController@filter')->name('filter');