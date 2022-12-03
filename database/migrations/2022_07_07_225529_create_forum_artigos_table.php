<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_artigos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artigo_id');
            $table->text('mensagem');
            $table->unsignedBigInteger('user_id');
            $table->string('user_name');
            $table->string('user_imagem');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('user_name')->references('name')->on('users');
            // $table->foreign('user_imagem')->references('imagem')->on('users');
            $table->foreign('artigo_id')->references('id')->on('artigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_artigos');
    }
}