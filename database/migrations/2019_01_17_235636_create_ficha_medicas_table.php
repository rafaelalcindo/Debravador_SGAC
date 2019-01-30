<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_medicas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('plano_saude',60)->nullable();
            $table->string('carteira_nac_saude',20)->nullable();
            $table->text('doenc_teve')->nullable();
            $table->text('problema_saude');
            $table->text('alergia');
            $table->string('tipo_sanguineo',10);

            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios');

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
        Schema::dropIfExists('ficha_medicas');
    }
}
