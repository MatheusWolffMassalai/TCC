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
            $table->id();
            $table->unsignedBigInteger('id_filo')->unique();
            $table->string('nome_filo')->unique();
            $table->foreign('id_filo')->references('id')->on('filos');
            $table->foreign('nome_filo')->references('nome_filo')->on('filos');
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