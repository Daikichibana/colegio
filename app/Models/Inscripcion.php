<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table="Inscripcion";
    protected $fillable=[
        'id_inscripcion',
        'fecha',
        'id_curso',
        'id_estudiante',
        'id_apoderado'
    ];
    public $timestamp=false;
}
