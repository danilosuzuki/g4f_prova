<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeriesTv>
 */
class SeriesTvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $canais = ['Disney Channel', 'Discovery', 'Fox']; // Opções de Canais a serem gerados
        $generos = ['Terror', 'Comédia', 'Ação', 'Animação', 'Suspense', 'Romance', 'Aventura']; // Opções de Gêneros a serem gerados

        return [
            'titulo' => fake()->name(), // Gerar um titulo aleatório
            'canal' => fake()->randomElement($canais), // Gerar um canal aleatório
            'genero' => fake()->randomElement($generos), // Gerar um genero aleatório
        ];
    }
}
