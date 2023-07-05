<?php

namespace Tests\Feature;

use App\Services\Questao2Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Questao2ServiceTest extends TestCase
{
    protected $questao2Service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->questao2Service = new Questao2Service();
    }

    public function test_geraASCII()
    {
        $ascii = $this->questao2Service->geraASCII(false);
        $this->assertCount(81, $ascii); // Verifica se o array possui 81 elementos
        $this->assertEquals(',', $ascii[0]); // Verifica se o primeiro elemento é a vírgula
        $this->assertEquals('|', $ascii[80]); // Verifica se o último elemento é a barra vertical

        $asciiRandom = $this->questao2Service->geraASCII(true);
        $this->assertCount(80, $asciiRandom); // Verifica se o array possui 80 elementos
    }

    public function test_encontraCharFaltando()
    {
        //Inicializa os arrays de ascii e referencia
        $referencia = ['a', 'b', 'c', 'd'];
        $ascii = ['a', 'c', 'd'];

        $charFaltando = $this->questao2Service->encontraCharFaltando($referencia, $ascii);
        $this->assertEquals('b', $charFaltando); // Verifica 'b' estã faltando
    }

    public function test_index()
    {
        $result = $this->questao2Service->index();
        $this->assertIsArray($result); //Se é um array
        //Verifica as chaves
        $this->assertArrayHasKey('referencia_ascii', $result);
        $this->assertArrayHasKey('falta_ascii', $result); 
        $this->assertArrayHasKey('char', $result); 
        //Verifica os valores
        $this->assertIsArray($result['referencia_ascii']); //Se é um array
        $this->assertIsArray($result['falta_ascii']); //Se é um array
        $this->assertIsString($result['char']); //Se é uma string
    }
}
