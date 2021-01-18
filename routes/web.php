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
    if (Auth::user()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::resource('usuarios', 'UsuariosController');
Route::get('usuarios/{id}/delete', 'UsuariosController@destroy');
Route::get('usuarios/{id}/qr_code', 'UsuariosController@qrCodeUsuario');

Route::resource('unidades', 'UnidadesController');
Route::get('unidades/{id}/delete', 'UnidadesController@destroy');

Route::get('responsaveis/index/{id}', 'ResponsavelsController@index');
Route::get('responsaveis/create/{id_usuario}', 'ResponsavelsController@create');
Route::post('responsaveis/', 'ResponsavelsController@store');
Route::get('responsaveis/edit/{id}/{id_usuario}', 'ResponsavelsController@edit');
Route::put('responsaveis/{id}', 'ResponsavelsController@update');
Route::get('responsaveis/delete/{id}/{id_usuario}', 'ResponsavelsController@destroy');
Route::get('responsaveis/show/{id}/{id_usuario}', 'ResponsavelsController@show');

Route::get('ficha-medicas/index/{id}', 'FichaMedicasController@index');
Route::get('ficha-medicas/create/{id_usuario}', 'FichaMedicasController@create');
Route::post('ficha-medicas/', 'FichaMedicasController@store');
Route::get('ficha-medicas/edit/{id}/{id_usuario}', 'FichaMedicasController@edit');
Route::put('ficha-medicas/{id}', 'FichaMedicasController@update');


Route::resource('ponto-unidades', 'PontoUnidadesController');
Route::get('ponto-unidades/{id}/delete', 'PontoUnidadesController@destroy');

Route::resource('ponto_individuals', 'PontoIndividuaisController');
Route::get('ponto_individuals/{id}/delete', 'PontoIndividuaisController@destroy');

Route::get('eventos/adicionar_pontos_eventos', 'EventosController@adicionarPontosEventos');
Route::resource('eventos', 'EventosController');



Route::get('especialidades/index/{id}', 'EspecialidadesController@index');
Route::get('especialidades/create/{id_usuario}', 'EspecialidadesController@create');
Route::post('especialidades/', 'EspecialidadesController@store');
Route::get('especialidades/edit/{id}/{id_usuario}', 'EspecialidadesController@edit');
Route::put('especialidades/{id}', 'EspecialidadesController@update');
Route::get('especialidades/delete/{id}/{id_usuario}', 'EspecialidadesController@destroy');
Route::get('especialidades/show/{id}/{id_usuario}', 'EspecialidadesController@show');

Route::get('classes/index/{id}', 'ClassesController@index');
Route::get('classes/create/{id_usuario}', 'ClassesController@create');
Route::post('classes/', 'ClassesController@store');
Route::get('classes/edit/{id}/{id_usuario}', 'ClassesController@edit');
Route::put('classes/{id}', 'ClassesController@update');
Route::get('classes/delete/{id}/{id_usuario}', 'ClassesController@destroy');
Route::get('classes/show/{id}/{id_usuario}', 'ClassesController@show');

Route::get('hora_da_entrada', 'HoraDaEntradaController@index');
Route::get('hora_da_entrada/create', 'HoraDaEntradaController@create');
Route::post('hora_da_entrada', 'HoraDaEntradaController@store');
Route::get('hora_da_entrada/edit/{id}', 'HoraDaEntradaController@edit');
Route::put('hora_da_entrada/{id}', 'HoraDaEntradaController@update');
Route::get('hora_da_entrada/delete/{id}', 'HoraDaEntradaController@destroy');

Route::get('hora_da_entrada/seleciona_usuario/{id}', 'HoraDaEntradaController@selecionaUsuario');
Route::get('hora_da_entrada/adicionar_usuario_horario/', 'HoraDaEntradaController@adicionarUsuarioHorario');

Route::get('/home', 'HomeController@index')->name('home');
