<?php

namespace Tests\Feature;

use App\Models\SeriesTv;
use App\Models\SeriesTvIntervalos;
use App\Repositories\Questao3Repository;
use App\Services\Questao3Service;
use Database\Factories\SeriesTvFactory;
use Database\Factories\SeriesTvIntervalosFactory;
use Faker\Test\Provider\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Questao3Test extends TestCase
{
    use DatabaseTransactions;

    public function test_index()
    {
        $response = $this->get('/questao3');

        $response->assertStatus(200);
        $response->assertViewHas('series');
        $response->assertViewIs('questao3');
    }

    public function test_proximaSerie()
    {
        $serieTv = new SeriesTv();
        // Cria os objetos necessários, simulando a corrente que acontece.
        $repository = new Questao3Repository($serieTv);
        $service = new Questao3Service($repository);

        $proximaSerie = $service->proximaSerie(null, null, null);
        $this->assertInstanceOf(Model::class, $proximaSerie);// Verifica se retornou uma Model

        $response = $this->get('/questao3/proxima/00:00/1/1');//chamando com parametros
        $response->assertStatus(200);
    }
}
