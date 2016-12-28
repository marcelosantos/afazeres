<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    //Declaração de atributos da classe
    private $titulo = "";
    private $descricao = "";
    private $status = "";
    private $dt_criacao = "";
    private $id_atividade = "";
    private $atividades = [];

    //Construtor da classe
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

    //Método para retornar a listagem de atividades existentes no arquivo JSON
    public function lista_atividades(){

        try{

            $lista_de_atividades = [];
            $lista_de_atividades = json_decode(file_get_contents(__DIR__ . "/atividades.json"),TRUE);
            return $lista_de_atividades;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método persisitir uma atividade no arquivo JSON
    public function persiste_atividades($lista_de_atividades){

        try{

            file_put_contents(__DIR__ . "/atividades.json", json_encode($lista_de_atividades,TRUE));
            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }


    }

    //Método para adicionar novas atividades no arquivo JSON
    public function adicionar(){

        try{

            $lista_de_atividades = $this->lista_atividades();

            $nova_atividade = [
                'id_atividade'=> $this->id_atividade,
                'titulo'=> $this->titulo,
                'descricao'=> $this->descricao,
                'status'=> $this->status,
                'dt_criacao'=> $this->dt_criacao
            ];
            $lista_de_atividades[] = $nova_atividade;
            $this->persiste_atividades($lista_de_atividades);

            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para listar as atividades e retornar para API REST disponibilizar
    public function listar(){

        try{

            $lista_de_atividades = $this->lista_atividades();
            return $lista_de_atividades;

        }catch(Exception $e){

            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para editar uma atividade selecionada para edição no arquivo JSON
    public function editar(){

        try{

            $lista_de_atividades = $this->lista_atividades();

            $nova_atividade = [
                'id_atividade'=> $this->id_atividade,
                'titulo'=> $this->titulo,
                'descricao'=> $this->descricao,
                'status'=> $this->status,
                'dt_criacao'=> $this->dt_criacao
            ];

            foreach ($lista_de_atividades as $key => $value) {

                if($this->id_atividade == $value['id_atividade']){
                    $value = $nova_atividade;
                    $lista_de_atividades[$key] = $value;
                }

            }

            $this->persiste_atividades($lista_de_atividades);

            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para remover todas as atividades
    public function limpar(){

        try{

            $lista_de_atividades = [];
            $this->persiste_atividades($lista_de_atividades);
            return $lista_de_atividades;

        }catch(Exception $e){

            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para excluir uma atividade selecionada
    public function excluir(){

        try{

            $lista_de_atividades = $this->lista_atividades();

            foreach ($lista_de_atividades as $key => $value) {

                if($this->id_atividade == $value['id_atividade']){
                    unset($lista_de_atividades[$key]);
                }

            }

            $this->persiste_atividades($lista_de_atividades);

            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para finalizar uma atividade selecionada
    public function finalizar(){

        try{

            $lista_de_atividades = $this->lista_atividades();

            foreach ($lista_de_atividades as $key => $value) {

                if($this->id_atividade == $value['id_atividade']){
                    $finalizar_atividade = [
                        'id_atividade'=> $value['id_atividade'],
                        'titulo'=> $value['titulo'],
                        'descricao'=> $value['descricao'],
                        'status'=> 'true',
                        'dt_criacao'=> $value['dt_criacao']
                    ];
                    $value = $finalizar_atividade;
                    $lista_de_atividades[$key] = $value;
                }

            }

            $this->persiste_atividades($lista_de_atividades);

            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

    //Método para tornar pendente uma atividade selecionada que já foi finalizada
    public function pendenciar(){

        try{

            $lista_de_atividades = $this->lista_atividades();

            foreach ($lista_de_atividades as $key => $value) {

                if($this->id_atividade == $value['id_atividade']){
                    $finalizar_atividade = [
                        'id_atividade'=> $value['id_atividade'],
                        'titulo'=> $value['titulo'],
                        'descricao'=> $value['descricao'],
                        'status'=> 'false',
                        'dt_criacao'=> $value['dt_criacao']
                    ];
                    $value = $finalizar_atividade;
                    $lista_de_atividades[$key] = $value;
                }

            }

            $this->persiste_atividades($lista_de_atividades);

            return TRUE;

        }catch(Exception $e){

            return FALSE;
            throw new Exception("Ocorreu algo de errado! {$e->getMessage()}");

        }

    }

}
