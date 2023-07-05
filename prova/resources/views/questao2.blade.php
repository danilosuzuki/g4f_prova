@extends('index')

    @section('content')
        {{-- Enunciado --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="p-3 mb-5">
                    <h1 class="text-center my-5">Questão 2</h1>
                    <p>Escreva um script PHP para gerar um array aleatório com todos os caracteres ASCII, da vírgula “,” até a barra vertical (pipe) “|”. Então, remova e descarte de forma randômica, um elemento deste array que foi gerado.</p>
                    <p>Em seguida, escreva um código que de forma eficiente retorne e imprima o caracter que está faltando.</p>
                </div>
            </div>
        </div>
        {{-- Resultado --}}
        <div class="row mb-5 justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title text-center">{{$dados['char']}}</h5>
                  <p class="card-sub-title text-center">Caractér Retirado</p>
                </div>
              </div>
        </div>
        <div class="row justify-content-center mb-5">
            {{-- Referencia --}}
            <div class="col-6">
                <table class="table table-striped" id="tabela-referencia">
                    <h2 class="text-center mb-3">Tabela de Referência</h2>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Decimal</th>
                            <th scope="col">Caractér</th>
                        </tr>
                    </thead>
                    <tbody id="referencia">
                        @foreach($dados['referencia_ascii'] as $indice => $valor)
                        <tr>
                            <td>{{$indice}}</td>
                            <td>{{ord($valor)}}</td>
                            <td>{{$valor}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Decimal</th>
                            <th scope="col">Caractér</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{-- Tabela utilizada --}}
            <div class="col-6">
                <table class="table table-striped" id="tabela-resultado">
                    <h2 class="text-center mb-3">Tabela Aleatória Gerada</h2>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Decimal</th>
                            <th scope="col">Caractér</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                        @foreach($dados['falta_ascii'] as $indice => $valor)
                        <tr>
                            <td>{{$indice}}</td>
                            <td>{{ord($valor)}}</td>
                            <td>{{$valor}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Decimal</th>
                            <th scope="col">Caractér</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <script src="js/questao2.js"></script>
    @endsection