<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignacionCursoGestion extends Model
{
    protected $table = 'asigancioncursogestion';
    protected $fillable=[
        'id_curso',
        'id_gestion'
    ];
    public $timestamps=false;
}


// para la migracion, talvez digo no mas
// $table->id();
// $table->unsignedBigInteger('id_curso');
// $table->unsignedBigInteger('id_gestion');

// $table->unique(['id_curso', 'id_gestion']);

// $table->foreign('id_curso')->references('id')->on('curso')->onDelete('cascade');
// $table->foreign('id_gestion')->references('id')->on('gestion')->onDelete('cascade');