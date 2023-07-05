<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Questao3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SeriesTv::factory(10)->create();
        \App\Models\SeriesTvIntervalos::factory(50)->create();
    }
}
