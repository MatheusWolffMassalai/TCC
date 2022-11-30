<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NovosTopicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novos_topicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artigo_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('especialista_id');
            $table->text('texto');
            $table->text('titulo');
            $table->boolean('aceito');
            $table->string('imagem')->nullable();
            $table->foreign('artigo_id')->references('id')->on('artigo');
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
        Schema::dropIfExists('novos_topicos');
    }
}