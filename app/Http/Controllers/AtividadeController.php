<?php

namespace App\Http\Controllers;

use App\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{

    public function cadastrar(Request $request)
    {
        $atividade = new Atividade();
        $atividade->titulo = $request->titulo;
        $atividade->descricao = $request->descricao;
        $atividade->status = $request->status;
        $atividade->dt_criacao = $request->dt_criacao;
        $atividade->save();

        return array("a","b");
    }

    public function listar()
    {
        return array("a");
    }

}
