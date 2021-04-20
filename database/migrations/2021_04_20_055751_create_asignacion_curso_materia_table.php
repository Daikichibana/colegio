<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionCursoMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionCursoMateria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acursogestion');
            $table->unsignedBigInteger('id_materia');

            $table->unique(['id_acursogestion', 'id_materia']);

            $table->foreign('id_acursogestion')->references('id')->on('asignacioncursogestion');
            $table->foreign('id_materia')->references('id')->on('materia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacionCursoMateria');
    }
}
