<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacioncursogestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacioncursogestion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_gestion');
            $table->unsignedBigInteger('id_paralelo');

            $table->unique(['id_curso', 'id_gestion', 'id_paralelo']);

            $table->foreign('id_curso')->references('id')->on('curso');
            $table->foreign('id_gestion')->references('id')->on('gestion');
            $table->foreign('id_paralelo')->references('id')->on('paralelo');

            /*
            $table->primary(['id_curso', 'id_gestion']);
            $table->foreignId('id_curso');
            $table->foreignId('id_gestion');
            $table->foreignId('id_paralelo');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigancioncursogestion');
    }
}
