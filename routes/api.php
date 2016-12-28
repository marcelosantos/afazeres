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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/adicionar', function (Request $request) {
    $atividade = new App\Atividade("Teste 1","Desc 1","false",date("Y-m-d"));
    #echo "<pre>";
    #print_r($atividade); die;
    return $atividade->adicionar();
});

Route::get('/listar', function (Request $request) {
    $atividade = new App\Atividade;
    return $atividade->listar();
});
