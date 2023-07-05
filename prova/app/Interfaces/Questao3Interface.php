<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface Questao3Interface
{
    public function __construct(Model $model);

    public function all();

    public function proximaSerie(?string $horario = null, ?int $dia = null, ?int $serie = null);
}