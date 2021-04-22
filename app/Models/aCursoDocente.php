<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aCursoDocente extends Model
{
    protected $table = 'asignacioncursodocente';
    protected $fillable=[
        'id_aCursoMateria',
        'id_docente'
    ];
    public $timestamps=false;

    public function estudiante(){
        return $this->belongsToMany(Estudiante::class, 'asignacioncursoestudiante', 'id_aCursoDocente','id_estudiante');
    }
}
