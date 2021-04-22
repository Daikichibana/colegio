<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';
    protected $fillable=[
        'nombre',
        'apellidos',
        'direccion',
        'telefono'
    ];
    public $timestamps=false;

    public function acursodocente(){
        return $this->belongsToMany(aCursoDocente::class, 'asignacioncursoestudiante', 'id_estudiante','id_aCursoDocente');
    }
}
