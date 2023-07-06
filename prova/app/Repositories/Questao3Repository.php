<?php

namespace App\Repositories;

use App\Interfaces\Questao3Interface;
use App\Models\SeriesTv;
use App\Models\SeriesTvIntervalos;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class Questao3Repository implements Questao3Interface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all():Collection
    {
        return $this->model->all();
    }

    public function proximaSerie(?string $horario = null, ?int $dia = null, ?int $serie = null): Model
    {
        //Inicializa dia e horário com base nos valores atuais ou com valores informados pelo usuário
        $atual = new DateTime();
        $atual->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        $dia_da_semana_atual = $dia == null ? $atual->format('N') : $dia;
        $horario_atual = $horario == null ? $atual->format('H:i:s') : $horario;
        $incremento = 0;// Contador de iteração para reset de dia/hora

        do{
            if($incremento>1){// Passa para o próximo dia os valores de dia/hora
                $dia_da_semana_atual++;
                $horario_atual = '00:00:00';
                if($dia_da_semana_atual>7)
                    $dia_da_semana_atual=1;
            }
            $proxima = new SeriesTvIntervalos();// Cria um objeto novo
            $proxima = $proxima->where('dia_da_semana',$dia_da_semana_atual)
                ->where('horario','>',$horario_atual);// Consulto para ver há alguma série com horário maior e que seja no mesmo dia.
            if($serie != null)//condição para filtrar por série
                $proxima = $proxima->where('id_serie_tv',$serie);
            $proxima = $proxima->orderBy('series_tv_intervalos.dia_da_semana')
                ->orderBy('series_tv_intervalos.horario')
                ->first();//Organizo e pego a model
            $incremento++;//Incremento o contador
        }while($proxima == null && $incremento<=8);// Condição de parada
        return $proxima->load('serie');//Retorna objeto fraco + objeto forte
    }
    
}