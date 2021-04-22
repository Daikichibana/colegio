<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionCursoEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionCursoEstudiante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aCursoDocente');
            $table->unsignedBigInteger('id_estudiante');

            $table->unique(['id_aCursoDocente', 'id_estudiante']);

            $table->foreign('id_aCursoDocente')->references('id')->on('asignacionCursoDocente');
            $table->foreign('id_estudiante')->references('id')->on('estudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacionCursoEstudiante');
    }
}
