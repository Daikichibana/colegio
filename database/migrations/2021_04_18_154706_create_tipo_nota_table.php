<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_nota', function (Blueprint $table) {
            $table->id();
            $table->integer('nota_ser');
            $table->integer('nota_saber');
            $table->integer('nota_hacer');
            $table->integer('nota_decidir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_nota');
    }
}
