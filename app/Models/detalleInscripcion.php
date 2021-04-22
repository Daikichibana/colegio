<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleInscripcion extends Model
{
    protected $table="detalle_inscripcion";
    protected $fillable=[
        'id_Apoderado',
        'id_inscripcion',
        'relacion'
    ];
    public $timestamps = false;
}
