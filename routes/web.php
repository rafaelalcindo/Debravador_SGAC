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

Auth::routes();

Route::resource('usuarios', 'UsuariosController');

Route::resource('unidades', 'UnidadesController');
Route::get('unidades/{id}/delete','UnidadesController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
