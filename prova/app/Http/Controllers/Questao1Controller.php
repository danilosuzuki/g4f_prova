<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Questao1Controller extends Controller
{
    public function index():View
    {
        return view('questao1');
    }
    
}
