<?php

namespace App\Http\Controllers;

use App\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{

    //Ação responsável por recber a requisição e criar uma atividade
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

    //Ação responsável por recber a requisição e listar as atividades
    public function listar(Request $request){

        $atividade = new Atividade;
        return $atividade->listar();

    }

    //Ação responsável por recber a requisição e editar uma atividade
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

    //Ação responsável por recber a requisição remover todas as atividades
    public function limpar(Request $request){

        $atividade = new Atividade;
        $atividade->limpar();
        return $atividade->listar();

    }

    //Ação responsável por recber a requisição e excluir uma atividade
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

    //Ação responsável por recber a requisição e mudar uma atividade para finalizada
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

    //Ação responsável por recber a requisição e mudar uma atividade para pendente
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
