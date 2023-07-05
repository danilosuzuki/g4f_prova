<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Services\Questao2Service;

class Questao2Controller extends Controller
{
    protected $service;

    public function __construct(Questao2Service $service)
    {
        $this->service = $service;
    }

    public function index():View
    {
        $dados = $this->service->index(); //Recebe os valores do service
        return view('questao2', compact('dados'));
    }
}
