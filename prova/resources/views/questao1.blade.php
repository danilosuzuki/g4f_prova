@extends('index')

@section('content')
        <div class="row justify-content-center">
            <div class="col-12">
                
                <div class="p-3 mb-5">
                    <h1 class="text-center my-5">Questão 1</h1>
                    <p>Escreva um script utilizando apenas JavaScript que imprima todos os números inteiro de 1 até 100.<br>Ao lado de cada número, imprima os números dos quais ele é múltiplo (entre colchetes e separados por vírgula). Se o número for múltiplo apenas de si mesmo, imprima "[PRIMO]"</p>
                    <p>Os resultados deverão ser impressos em uma página HTML. Aspectos que tornem o layout da página mais agradável serão considerados.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <table class="table table-striped" id="tabela-resultado">
                <h2 class="text-center mb-3">Tabela de Resultado</h2>
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Primos</th>
                    </tr>
                </thead>
                <tbody id="resultado">
                    <!-- Resultado vem aqui -->
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Primos</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script src="js/questao1.js"></script>
@endsection