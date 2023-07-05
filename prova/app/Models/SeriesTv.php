<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesTv extends Model
{
    use HasFactory;

    protected $table = 'series_tv';
    protected $primaryKey = 'id';

    protected $fillable = ['titulo','genero','canal'];

    public function intervalo()
    {
        return $this->hasMany(SeriesTvIntervalos::class, 'id_serie_tv');
    }
}