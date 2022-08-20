<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_filo');
            $table->text('pergunta');
            $table->text('resposta_certa');
            $table->text('resposta_errada1');
            $table->text('resposta_errada2');
            $table->text('resposta_errada3');
            $table->foreign('id_filo')->references('id')->on('filos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercicios');
    }
}