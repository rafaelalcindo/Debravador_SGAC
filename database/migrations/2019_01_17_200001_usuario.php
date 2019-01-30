<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('sobrenome',100);
            $table->string('login',100)->unique();            
            $table->string('password');
            $table->rememberToken();

            $table->char('cep',8)->nullable();
            $table->string('endereco',80);
            $table->string('complemento',100)->nullable();
            $table->string('cidade',20);
            $table->string('estado',20);

            $table->string('tel',20)->nullable();
            $table->string('cel',20)->nullable();

            $table->tinyInteger('ativo');
            $table->dateTime('data_nasc');
            $table->string('rg',12)->nullable();
            $table->string('cpf',13)->nullable();
            $table->string('tamanho_camisa',10)->nullable();

            $table->integer('nivel')->unsigned();

            $table->integer('unidade_id')->unsigned()->nullable();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            
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
        //
        Schema::dropIfExists('usuarios');
    }
}
