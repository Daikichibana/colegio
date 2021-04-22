<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aCursoMateria extends Model
{
    protected $table = 'asignacioncursomateria';
    protected $fillable=[
        'id_acursogestion',
        'id_materia'
    ];
    public $timestamps=false;
    
    public function docente(){
        return $this->belongsToMany(Docente::class, 'asignacioncursodocente', 'id_aCursoMateria','id_docente');
    }

}
