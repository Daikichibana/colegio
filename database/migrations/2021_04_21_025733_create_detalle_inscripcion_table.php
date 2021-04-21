<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inscripcion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Apoderado');
            $table->unsignedBigInteger('id_inscripcion');
            $table->string('relacion',50);
      
            $table->primary(['id_Apoderado', 'id_inscripcion']);

            $table->foreign('id_Apoderado')->references('id')->on('apoderado');
            $table->foreign('id_inscripcion')->references('id')->on('inscripcion');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_inscripcion');
    }
}
