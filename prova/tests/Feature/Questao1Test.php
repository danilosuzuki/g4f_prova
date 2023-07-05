<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Questao1Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $response = $this->get('/questao1');

        $response->assertStatus(200);
        $response->assertViewIs('questao1');
    }
}
