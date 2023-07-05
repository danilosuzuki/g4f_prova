<?php

namespace Database\Factories;

use App\Models\SeriesTv;
use App\Models\SeriesTvIntervalos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeriesTvIntervalos>
 */
class SeriesTvIntervalosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $serieTV = SeriesTV::inRandomOrder()->first();// Obter uma série de TV aleatória
    $diaDaSemana = fake()->numberBetween(1, 7); // Gerar valores aleatórios para dia_da_semana
    $horario = fake()->time(); // Gerar valores aleatórios para e horario

    // Verificar se já existe um intervalo com os mesmos valores de dia_da_semana e horario para a série de TV
    $temSerie = SeriesTvIntervalos::leftjoin('series_tv','series_tv.id','=','series_tv_intervalo.id_serie_tv')
        ->where('series_tv.canal',$serieTV->canal)
        ->where('series_tv_intervalo.dia_da_semana', $diaDaSemana)
        ->where('series_tv_intervalo.horario', $horario)
        ->exists();

    
    while ($temSerie) { // Se já existir um intervalo com os mesmos valores ou outra série do mesmo canal com o mesmo horário e dia_da_semana, gera novos valores para dia_da_semana e horario
        $diaDaSemana = fake()->numberBetween(1, 7);
        $horario = fake()->time();
        // Verificar se já existe um intervalo com os mesmos valores de dia_da_semana e horario para a série de TV
        $temSerie = SeriesTvIntervalos::leftjoin('series_tv','series_tv.id','=','series_tv_intervalo.id_serie_tv')
            ->where('series_tv.canal',$serieTV->canal)
            ->where('series_tv_intervalo.dia_da_semana', $diaDaSemana)
            ->where('series_tv_intervalo.horario', $horario)
            ->exists();
    }

    return [// Retorna os valores gerados
        'id_serie_tv' => $serieTV->id,
        'dia_da_semana' => $diaDaSemana,
        'horario' => $horario,
    ];
    }
}
