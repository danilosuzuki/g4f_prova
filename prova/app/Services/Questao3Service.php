<?php

namespace App\Services;

use App\Interfaces\Questao3Interface;
use App\Models\SeriesTv;
use App\Repositories\Questao3Repository;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Questao3Service
{
    protected $repository;

    public function __construct(Questao3Interface $repository)
    {
        $this->repository = $repository;
    }

    public function index():Collection
    {
        return $this->repository->all();
    }

    public function proximaSerie(?string $horario = null, ?int $dia = null, ?int $serie = null):Model
    {
        return $this->repository->proximaSerie($horario,$dia,$serie);
    }

}

?>

