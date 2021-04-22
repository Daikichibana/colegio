<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docente';
    protected $fillable=[
        'nombre',
        'apellidos',
        'direccion',
        'telefono'
    ];
    public $timestamps=false;
    public function acursomateria(){
        return $this->belongsToMany(aCursoMateria::class, 'asignacioncursodocente', 'id_docente','id_aCursoMateria');
    }
}
