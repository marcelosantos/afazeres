<?php

namespace App\Http\Controllers;

use App\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{

    public function adicionar(Request $request){

        $atividade = new Atividade(
            $request->input('titulo'),
            $request->input('descricao'),
            $request->input('status'),
            date("Y-m-d")
        );
        $atividade->adicionar();

        return $atividade->listar();

    }

    public function listar(Request $request){

        $atividade = new Atividade;
        return $atividade->listar();

    }

    public function editar(Request $request){

        $atividade = new Atividade(
            $request->input('titulo'),
            $request->input('descricao'),
            $request->input('status'),
            date("Y-m-d"),
            $request->input('id_atividade')
        );
        $atividade->editar();
        return $atividade->listar();

    }

    public function limpar(Request $request){

        $atividade = new Atividade;
        $atividade->limpar();
        return $atividade->listar();

    }

    public function excluir(Request $request){

        $atividade = new Atividade(
            NULL,
            NULL,
            NULL,
            NULL,
            $request->input('id_atividade')
        );
        $atividade->excluir();
        return $atividade->listar();

    }

    public function finalizar(Request $request){

        $atividade = new Atividade(
            NULL,
            NULL,
            NULL,
            NULL,
            $request->input('id_atividade')
        );
        $atividade->finalizar();
        return $atividade->listar();

    }

    public function pendenciar(Request $request){

        $atividade = new Atividade(
            NULL,
            NULL,
            NULL,
            NULL,
            $request->input('id_atividade')
        );
        $atividade->pendenciar();
        return $atividade->listar();

    }

}
