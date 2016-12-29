<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AtividadeTest extends TestCase
{

    /**
     * Um teste funcional básico para acesso à API.
     *
     * @return void
     */

    public function testAdicionar()
	{

        $this->json('POST', '/api/adicionar', [
                'titulo' => 'Minha Atividade',
                'descricao' => 'Sobre a Atividade',
                'status' => 'false',
                'dt_criacao' => date("Y-m-d")
            ])
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testListar()
	{

        $this->json('GET', '/api/listar')
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testEditar()
	{

        $this->json('POST', '/api/editar', [
                'id_atividade' => 'e23cfc9c300279848a9393e235e5fe3d0ba1be54',
                'titulo' => 'Minha Atividade',
                'descricao' => 'Sobre a Atividade',
                'status' => 'false',
                'dt_criacao' => date("Y-m-d")
            ])
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testLimpar()
	{

        $this->json('POST', '/api/limpar')
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testExcluir()
	{

        $this->json('POST', '/api/editar', [
                'id_atividade' => 'e23cfc9c300279848a9393e235e5fe3d0ba1be54'
            ])
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testFinalizar()
	{

        $this->json('POST', '/api/editar', [
                'id_atividade' => 'e23cfc9c300279848a9393e235e5fe3d0ba1be54'
            ])
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

    public function testPendenciar()
	{

        $this->json('POST', '/api/editar', [
                'id_atividade' => 'e23cfc9c300279848a9393e235e5fe3d0ba1be54'
            ])
            ->seeJsonStructure([
                '*' => [
                    'titulo', 'descricao', 'status','dt_criacao'
                ]
            ]);

	}

}
