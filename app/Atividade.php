<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{

    private $titulo = "";
    private $descricao = "";
    private $status = "";
    private $dt_criacao = "";
    private $id_atividade = "";
    private $atividades = [];

    public function __construct($titulo="",$descricao="",$status="",$dt_criacao="",$id_atividade=""){

        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->status = $status;
        $this->dt_criacao = $dt_criacao;

        if(empty($id_atividade)){
            $this->id_atividade = sha1(uniqid(date("Ymdhis")));
        }else{
            $this->id_atividade = $id_atividade;
        }


    }

    public function lista_atividades(){

        $lista_de_atividades = [];

        $lista_de_atividades = json_decode(file_get_contents(__DIR__ . "/atividades.json"),TRUE);
        //$json[$user] = array("first" => $first, "last" => $last);
        //file_put_contents(__DIR__ . "/atividades.json", json_encode($lista_de_atividades,TRUE));

        return $lista_de_atividades;

    }

    public function adicionar(){

        $lista_de_atividades = $this->lista_atividades();

        $nova_atividade = [
            'id_atividade'=> $this->id_atividade,
            'titulo'=> $this->titulo,
            'descricao'=> $this->descricao,
            'status'=> $this->status,
            'dt_criacao'=> $this->dt_criacao
        ];
        $lista_de_atividades[] = $nova_atividade;

        return $lista_de_atividades;

    }

    public function listar(){

        $lista_de_atividades = $this->lista_atividades();

        return $lista_de_atividades;

    }

}
