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

Route::prefix('auth')->group(function() {
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('auth.login');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard/home');
    })->name('admin.dashboard');

    Route::get('/articles/new', 'App\Http\Controllers\Admin\PostController@newArticlePage')->name('admin.new_article');
    Route::post('/articles/new', 'App\Http\Controllers\Admin\PostController@createArticle');

    Route::get('/article/edit/{id}', 'App\Http\Controllers\Admin\PostController@editArticlePage')->name('admin.edit_article');
    Route::post('/article/edit/{id}', 'App\Http\Controllers\Admin\PostController@editArticle');
});