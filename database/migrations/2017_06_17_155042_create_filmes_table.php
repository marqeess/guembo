<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('ano');
            $table->string('trailer');
            $table->longText('descricao');
            $table->integer('genero_id')->unsigned();
            $table->string('imagem');
            $table->timestamps();
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmes');
    }
}
