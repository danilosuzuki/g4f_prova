<?php

namespace App\Services;

use Illuminate\Contracts\View\View;

class Questao2Service
{

    public function index():array
    {
        $referencia_ascii = $this->geraASCII(false); //Cria uma tabela de referencia sem nada faltando
        $falta_ascii = $this->geraASCII(true); //Gera uma aleatória com char faltando
        $char = $this->encontraCharFaltando($referencia_ascii,$falta_ascii);//Encontra o char faltando
        return ['referencia_ascii'=>$referencia_ascii,'falta_ascii'=>$falta_ascii,'char'=>$char];
    }

    public function geraASCII(bool $random):array
    {
        $ascii = range(",", "|"); //Gera array com todos elementos
        
        if ($random) { // Randomiza e retira um elemento
            array_splice($ascii,array_rand($ascii), 1);
            shuffle($ascii);
        }
        return $ascii;
    }

    public function encontraCharFaltando(array $referencia, array $ascii):string
    {
        return current(array_diff($referencia, $ascii)); //Transforma em string o resultado da diferença entre dois arrays, só funciona para caso tenha apenas 1 elemento de diferença
    }

}

?>