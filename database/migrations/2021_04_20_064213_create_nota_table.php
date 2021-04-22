<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->integer('nota_ser');
            $table->integer('nota_saber');
            $table->integer('nota_hacer');
            $table->integer('nota_decidir');
            $table->unsignedBigInteger('id_bimestre');
            $table->unsignedBigInteger('id_aCursoEstudiante');

            $table->foreign('id_bimestre')->references('id')->on('bimestre');
            $table->foreign('id_aCursoEstudiante')->references('id')->on('asignacionCursoEstudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
