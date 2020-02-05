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
Route::get('/', 'HomeController@index')->name('home');

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
    Route::post('/atualizar/{id}', "$controller@update");
    Route::get('/listar', "$controller@listar");
    Route::post('/filtro', "$controller@filtro");
    Route::get('/exportar', "$controller@exportar");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
