<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo', function (Blueprint $table) {
            $table->increments('id');
            $table->text('filo')->unique();
            $table->text('cara_gerais');
            $table->text('classes')->nullable();
            $table->text('habitat')->nullable();
            $table->text('localizacao')->nullable();
            $table->text('alimentacao')->nullable();
            $table->text('fisiologia')->nullable();
            $table->text('exemplos')->nullable();
            $table->text('referencias')->nullable();
            $table->string('imagens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigo');
    }
}
