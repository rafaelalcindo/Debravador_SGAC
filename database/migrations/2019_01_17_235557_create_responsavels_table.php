<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavels', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome',100);
            $table->string('sobrenome',100);
            
            $table->char('cep',8)->nullable();
            $table->string('endereco',80);
            $table->string('complemento',100)->nullable();
            $table->string('cidade',20);
            $table->string('estado',20);

            $table->string('tel',20)->nullable();
            $table->string('cel',20)->nullable();

            $table->string('rg',14)->nullable();
            $table->string('cpf',14)->nullable();

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
        Schema::dropIfExists('responsavels');
    }
}
