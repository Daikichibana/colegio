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
        Schema::create('asigancioncursogestion', function (Blueprint $table) {
            $table->foreignId('id_curso');
            $table->foreignId('id_gestion');
            $table->primary(['id_curso', 'id_gestion']);
            $table->foreign('id_curso')->references('id')->on('curso');
            $table->foreign('id_gestion')->references('id')->on('gestion');
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
