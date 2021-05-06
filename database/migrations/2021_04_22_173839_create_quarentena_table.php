<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuarentenaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarentenas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('descricao', 130)->nullable();
            $table->integer('pontos');

            $table->tinyInteger('desbravador');

            $table->date('data_pontos');

            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('quarentena');
    }
}
