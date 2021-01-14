<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesbravadorHoraPontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desbravador_hora_pontos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->integer('hora_ponto_id')->unsigned();
            $table->foreign('hora_ponto_id')->references('id')->on('hora_pontos')->onDelete('cascade');

            $table->date('data_chegada');
            $table->time('hora_chegada');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desbravador_hora_pontos');
    }
}
