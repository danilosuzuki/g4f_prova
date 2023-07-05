<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series_tv', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('canal');
            $table->string('genero');
            $table->timestamps();
        });

        Schema::create('series_tv_intervalos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_serie_tv');
            $table->foreign('id_serie_tv')->references('id')->on('series_tv');
            $table->integer('dia_da_semana');
            $table->time('horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_tv');
        Schema::dropIfExists('series_tv_intervalos');
    }
};
