<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aCursoEstudiante extends Model
{
    protected $table = 'asignacioncursoestudiante';
    protected $fillable=[
        'id_aCursoEstudiante',
        'id_estudiante'
    ];
    public $timestamp=false;
    public function acursoestudiante(){
        return $this->hasMany(Nota::class, 'id_aCursoEstudiante');
    }
}
