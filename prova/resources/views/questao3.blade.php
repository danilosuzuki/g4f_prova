@extends('index')

    @section('content')
        {{-- Enunciado --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="p-3 mb-5">
                    <h1 class="text-center my-5">Questão 3</h1>
                    <p>Popule um banco de dados MySQL (InnoDB) com dados de pelo menos 3 séries de TV utilizando a seguinte estrutura:</p>
                    <p>series_tv -> (id, titulo, canal, genero);<br>series_tv_intervalos -> (id_serie_tv, dia_da_semana, horario);</p>
                    <p>Usando PHP OOP e JavaScript, escreva um código que informe quando a próxima série de TV será exibida levando em consideração a data e hora atuais, ou a partir de uma data e hora informados pelo usuário. Opcionalmente, o resultado também pode ser filtrado pela série de TV;</p>
                    <p>Fatores como usabilidade e agradabilidade do layout serão considerados.</p>
                </div>
            </div>
        </div>
        {{-- Resultado --}}
        <div class="row text-center justify-content-center mb-5">
            <h2>Próxima Série</h2>
            <h4 id='timer'></h4>
            <div class="row justify-content-center mt-3 mb-5">
                <div class="form-group col-3">
                    <label for="dia">Dia da semana</label>
                    <select class="form-control" id="dia">
                        <option value="">Selecione um dia</option>
                        <option value="1">Segunda</option>
                        <option value="2">Terça</option>
                        <option value="3">Quarta</option>
                        <option value="4">Quinta</option>
                        <option value="5">Sexta</option>
                        <option value="6">Sábado</option>
                        <option value="7">Domingo</option>
                    </select>
                </div>
                <div class="form-group col-2">
                    <label for="horario">Horário</label>
                    <input type="time" class="form-control" id="horario" placeholder="Horário">
                </div>
                <div class="form-group col-5">
                    <label for="serie">Série</label>
                    <input type="number" min="1" max="10" class="form-control" id="serie" placeholder="[ID] Confira nosso catálogo e selecione uma série...">
                </div>
                <div class="form-group col-2">
                    <label for="" style="color:transparent">Procurar</label>
                    <button class="form-control btn btn-primary" onclick='(procurarProxima())'>Procurar</button>
                </div>
            </div>
            {{-- Exibição da próxima série --}}
            <div class="row">
                <div class="card" style="width: 18rem;" id="card">
                    <img class="card-img-top serie-image" src="https://www.g4f.com.br/wp-content/uploads/2022/04/logo.svg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title" id="titulo_proximo">Nome da Série</h5>
                      <p class="card-sub-title" id="horario_proximo">Dia e horário</p>
                      <p class="card-text" id="informacao_proximo">Descritivo de canal e outras informações.</p>
                      <span class="badge bg-info text-dark" id="genero_proximo">Genero</span>
                    </div>
                  </div>
            </div>
        </div>
        {{-- Exibição do catálogo de séries a caráter de consulta --}}
        <div class="row text-center justify-content-center mb-5">
            
            <h3>Nosso Catálogo de Séries</h3>
            <table class="table table-striped" id="tabela-resultado">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Canal</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Pesquisar</th>
                    </tr>
                </thead>
                <tbody id="resultado">
                    @foreach ($series as $serie)
                        <tr>
                            <td>{{$serie->id}}</td>
                            <td>{{$serie->titulo}}</td>
                            <td>{{$serie->canal}}</td>
                            <td>{{$serie->genero}}</td>
                            <td><button class="btn" onclick="pesquisarID({{$serie->id}})"><i class="fa fa-search g4f"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Canal</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Pesquisar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script src="js/questao3.js"></script>
    @endsection