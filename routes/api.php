<?php

use Illuminate\Http\Request;

use App\Atividade;

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

Route::get('timezones', ['https' => 'true', 'uses' => 'Api\Utilities\LocalesController@timeZones']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/adicionar', function (Request $request) {
    $atividade = new App\Atividade(
        $request->input('titulo'),
        $request->input('descricao'),
        $request->input('status'),
        date("Y-m-d")
    );
    $atividade->adicionar();
    return $atividade->listar();
});

Route::get('/listar', function (Request $request) {
    $atividade = new App\Atividade;
    return $atividade->listar();
});

Route::post('/editar', function (Request $request) {
    $atividade = new App\Atividade(
        $request->input('titulo'),
        $request->input('descricao'),
        $request->input('status'),
        date("Y-m-d"),
        $request->input('id_atividade')
    );
    $atividade->editar();
    return $atividade->listar();
});

Route::post('/limpar', function (Request $request) {
    $atividade = new App\Atividade();
    $atividade->limpar();
    return $atividade->listar();
});

Route::post('/excluir', function (Request $request) {
    $atividade = new App\Atividade(
        NULL,
        NULL,
        NULL,
        NULL,
        $request->input('id_atividade')
    );
    $atividade->excluir();
    return $atividade->listar();
});

Route::post('/finalizar', function (Request $request) {
    $atividade = new App\Atividade(
        NULL,
        NULL,
        NULL,
        NULL,
        $request->input('id_atividade')
    );
    $atividade->finalizar();
    return $atividade->listar();
});

Route::post('/pendenciar', function (Request $request) {
    $atividade = new App\Atividade(
        NULL,
        NULL,
        NULL,
        NULL,
        $request->input('id_atividade')
    );
    $atividade->pendenciar();
    return $atividade->listar();
});
