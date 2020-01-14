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
/*

Route::view('/','pages.blog');
Route::view('/administradores','pages.administradores');
Route::view('/categorias','pages.categorias');
Route::view('/articulos','pages.articulos');
Route::view('/opiniones','pages.opiniones');
Route::view('/banners','pages.banners');
Route::view('/anuncios','pages.anuncios');


Route::get('/', 'Blog_ctr@show_blog');
Route::get('/administradores', 'Administrador_ctr@show_administradores');
Route::get('/categorias','Categoria_ctr@show_categorias');
Route::get('/articulos','Articulo_ctr@show_articulos');
Route::get('/opiniones','Opinion_ctr@show_opiniones');
Route::get('/banners','Banner_ctr@show_banners');
Route::get('/anuncios','Anuncio_ctr@show_anuncios');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas para put, get, delete, view, post
//php artisan route:list
Route::resource('/', 'Blog_ctr');
Route::resource('/blog', 'Blog_ctr');
Route::resource('/administradores', 'Administrador_ctr');
Route::resource('/categorias','Categoria_ctr');
Route::resource('/articulos','Articulo_ctr');
Route::resource('/opiniones','Opinion_ctr');
Route::resource('/banners','Banner_ctr');
Route::resource('/anuncios','Anuncio_ctr');