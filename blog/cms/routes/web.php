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
    return view('plantilla');
});

Route::view('/','pages.blog');
Route::view('/administradores','pages.administradores');
Route::view('/categorias','pages.categorias');
Route::view('/articulos','pages.articulos');
Route::view('/opiniones','pages.opiniones');
Route::view('/banners','pages.banners');
Route::view('/anuncios','pages.anuncios');

Route::get('/', 'Blog_ctr@show_blog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

