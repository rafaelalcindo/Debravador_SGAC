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
Route::get('usuarios/{id}/delete','UsuariosController@destroy');

Route::resource('unidades', 'UnidadesController');
Route::get('unidades/{id}/delete','UnidadesController@destroy');

Route::get('responsaveis/index/{id}', 'ResponsavelsController@index');
Route::get('responsaveis/create/{id_usuario}', 'ResponsavelsController@create');
Route::post('responsaveis/','ResponsavelsController@store');
Route::get('responsaveis/edit/{id}/{id_usuario}','ResponsavelsController@edit');
Route::put('responsaveis/{id}','ResponsavelsController@update');
Route::get('responsaveis/delete/{id}/{id_usuario}','ResponsavelsController@destroy');
Route::get('responsaveis/show/{id}/{id_usuario}','ResponsavelsController@show');

Route::get('ficha-medicas/index/{id}','FichaMedicasController@index');
Route::get('ficha-medicas/create/{id_usuario}','FichaMedicasController@create');


Route::resource('ponto-unidades','PontoUnidadesController');
Route::get('ponto-unidades/{id}/delete','PontoUnidadesController@destroy');

Route::resource('ponto_individuals', 'PontoIndividuaisController');
Route::get('ponto_individuals/{id}/delete', 'PontoIndividuaisController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
