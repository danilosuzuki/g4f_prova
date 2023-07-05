<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Questao3Service;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class Questao3Controller extends Controller
{
    protected $service;

    public function __construct(Questao3Service $service)
    {
        $this->service = $service;
    }

    public function index():View
    {
        $series = $this->service->index();
        return view('questao3', compact('series'));
    }

    public function proximaSerie(?string $horario = null, ?string $dia = null, ?string $serie = null): Model
    {
        // Conversão de tipos
        $horario = is_string($horario) && $horario !== 'null' ? $horario : null;
        $dia = is_numeric($dia) ? (int) $dia : null;
        $serie = is_numeric($serie) ? (int) $serie : null;

        return $this->service->proximaSerie($horario, $dia, $serie);
    }
}
