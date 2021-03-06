<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'unidade'
], function ($router) {
    Route::get('/', 'UnidadesApiController@index');
    Route::get('/{id}', 'UnidadesApiController@show');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'pontousuario'
], function ($router) {
    Route::get('/', 'PontoIndividuaisApiController@index');
    Route::get('/{id}', 'PontoIndividuaisApiController@show');
    Route::get('/usuario/{id_usuario}', 'PontoIndividuaisApiController@getUserPoints');
    Route::post('/', 'PontoIndividuaisApiController@store');
    Route::put('/{id}', 'PontoIndividuaisApiController@update');
    Route::delete('/{id}', 'PontoIndividuaisApiController@destroy');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'pontounidade'
], function ($router) {
    Route::get('/', 'PontoUnidadesApiController@index');
    Route::get('/{id}', 'PontoUnidadesApiController@show');
    Route::get('/usuario/{id_usuario}', 'PontoUnidadesApiController@getUserUnitPoints');
    Route::post('/', 'PontoUnidadesApiController@store');
    Route::put('/{id}', 'PontoUnidadesApiController@update');
    Route::delete('/{id}', 'PontoUnidadesApiController@destroy');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'eventos'
], function ($router) {
    Route::get('/', 'EventosApiController@index');
    Route::get('/add/desbravador', 'EventosApiController@addDebravadorEvento');
    Route::get('/lista/desbravador/{id}', 'EventosApiController@getDesbravadoresEvento');
    Route::get('/lista/desbravador/foraevento/{id}', 'EventosApiController@getDesbravadoresNaoEvento');
    Route::get('/add/pontos/desbravador', 'EventosApiController@adicionarDesbravadorEventoPonto');
    Route::post('/add/evento', 'EventosApiController@store');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'especialidades'
], function ($router) {
    Route::get('/lista/{id_usuario}', 'EspecialidadesApiController@especialidadeUsuario');
});

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'hora_pontos'
    ],
    function ($router) {
        Route::get('/pegar_datas', 'HoraDaEntradaApiController@carregarLista');
        Route::get('/detalhes/{id}', 'HoraDaEntradaApiController@selecionaUsuario');
        Route::get('/desbravador/forahoraponto/{id}', 'HoraDaEntradaApiController@selecionaUsuarioNaoMarcado');
        Route::get('/add/hora/desbravador', 'HoraDaEntradaApiController@adicionarUsuarioHorario');
        Route::post('/add/hora_ponto', 'HoraDaEntradaApiController@store');
    }
);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
