<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table="materia";
    protected $fillable=[
        'nombre'
    ];
    public $timestamp=false;
    public function asignacioncursogestion(){
        return $this->belongsToMany(asignacionCursoGestion::class, 'asignacioncursomateria', 'id_materia','id_acursogestion');
    }
}
