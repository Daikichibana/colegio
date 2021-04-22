<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table="inscripcion";
    protected $fillable=[
        'id',
        'fechaInscripcion',
        'id_aCursoGestion',
        'id_estudiante',
    ];
    public $timestamps=false;
}
