<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionCursoDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionCursoDocente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aCursoMateria');
            $table->unsignedBigInteger('id_docente');

            $table->unique(['id_aCursoMateria', 'id_docente']);

            $table->foreign('id_aCursoMateria')->references('id')->on('asignacionCursoMateria');
            $table->foreign('id_docente')->references('id')->on('docente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacionCursoDocente');
    }
}
