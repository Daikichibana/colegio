<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInscripcion');
            $table->unsignedBigInteger('id_aCursoGestion');
            $table->unsignedBigInteger('id_estudiante');

            $table->foreign('id_estudiante')->references('id')->on('estudiante');
            $table->foreign('id_aCursoGestion')->references('id')->on('asignacioncursogestion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
}
