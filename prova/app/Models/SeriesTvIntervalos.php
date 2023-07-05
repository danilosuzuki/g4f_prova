<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesTvIntervalos extends Model
{
    use HasFactory;

    protected $table = 'series_tv_intervalos';

    protected $fillable = [
        'dia_da_semana',
        'horario',
    ];
    
    public function serie()// Encontra objeto atrelado.
    {
        return $this->belongsTo(SeriesTv::class, 'id_serie_tv');
    }
}
