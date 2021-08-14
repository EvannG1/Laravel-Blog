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

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');
Route::get('/article/{id}', 'App\Http\Controllers\PostController@article')->name('article');
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');

Route::group(['prefix' => 'auth'], function() {
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('auth.login');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');
});