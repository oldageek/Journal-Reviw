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

Route::get('/articulos', 'ArticuloController@index') -> name('articulo.index');
Route::get('/articulos/create', 'ArticuloController@create') -> name('articulo.create');
Route::post('/articulos', 'ArticuloController@store') -> name('articulo.store');
Route::get('/articulos/{articulo}', 'ArticuloController@show') -> name('articulo.show');
Route::get('/articulos/{articulo}/edit', 'ArticuloController@edit') -> name('articulo.edit');
Route::put('/articulos/{articulo}', 'ArticuloController@update') -> name('articulo.update');
Route::delete('/articulos/{articulo}', 'ArticuloController@destroy') -> name('articulo.destroy');

// Ruta de perfil
Route::get('/perfiles/{perfil}', 'PerfilController@show') -> name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit') -> name('perfiles.edit');
Route::put('/perfiles/{perfil}', 'PerfilController@update') -> name('perfiles.update');

Route::get('/', 'InicioController@index') -> name('inicio.index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
