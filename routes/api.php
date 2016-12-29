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

Route::post('/adicionar', 'AtividadeController@adicionar');
Route::get('/listar', 'AtividadeController@listar');
Route::post('/editar', 'AtividadeController@editar');
Route::post('/limpar', 'AtividadeController@limpar');
Route::post('/excluir', 'AtividadeController@excluir');
Route::post('/finalizar', 'AtividadeController@finalizar');
Route::post('/pendenciar', 'AtividadeController@pendenciar');
