<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjetoTest extends TestCase
{
    /**
     * Um teste funcional básico.
     *
     * @return void
     */
    public function testPaginaInicial()
    {
        $this->visit('/')
             ->see('O Que Fazer');
    }

    public function testExisteURLApiAdicionar()
    {
        $response = $this->call('POST', '/api/adicionar');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiListar()
    {
        $response = $this->call('GET', '/api/listar');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiEditar()
    {
        $response = $this->call('POST', '/api/editar');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiExcluir()
    {
        $response = $this->call('POST', '/api/excluir');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiFinalizar()
    {
        $response = $this->call('POST', '/api/finalizar');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiPendenciar()
    {
        $response = $this->call('POST', '/api/pendenciar');
        $this->assertEquals(200, $response->status());
    }

    public function testExisteURLApiLimpar()
    {
        $response = $this->call('POST', '/api/limpar');
        $this->assertEquals(200, $response->status());
    }

}
