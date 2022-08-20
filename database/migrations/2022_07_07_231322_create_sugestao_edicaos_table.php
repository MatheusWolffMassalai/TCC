<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugestaoEdicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestao_edicaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_topico');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('especialista_id');
            $table->text('texto');
            $table->boolean('aceita');
            $table->string('imagem')->nullable();
            $table->foreign('id_topico')->references('id')->on('topicos_artigos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('especialista_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugestao_edicaos');
    }
}
