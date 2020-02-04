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

// ROTA PADRÃO
Route::get('/', 'ClienteController@index');

//CLIENTE
Route::prefix('cliente')->group(function () {
    $controller = 'ClienteController';

    Route::get('/', "$controller@cadastro");
    Route::post('/adicionar', "$controller@adicionar");
    Route::get('/{id}/editar', "$controller@editar");
    Route::get('/listar', "$controller@listar");
    Route::post('/atualizar/{id}', "$controller@update");
});

//Proposta
Route::prefix('proposta')->group(function () {
    $controller = 'PropostaController';

    Route::get('/', "$controller@cadastro");
    Route::post('/adicionar', "$controller@adicionar");
    Route::get('/{id}/editar', "$controller@editar");
    Route::get('/listar', "$controller@listar");
    Route::get('/listar/{nome}/{tipo}', "$controller@filtro");
    Route::post('/atualizar/{id}', "$controller@update");
});
