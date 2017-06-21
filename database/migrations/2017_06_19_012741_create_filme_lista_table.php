<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmeListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme_lista', function (Blueprint $table) {
            $table->primary(['lista_id', 'filme_id']);
            $table->integer('lista_id')->unsigned();
            $table->integer('filme_id')->unsigned();
            $table->timestamps();
            $table->foreign('lista_id')->references('id')->on('listas');
            $table->foreign('filme_id')->references('id')->on('filmes');
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
    }
}
