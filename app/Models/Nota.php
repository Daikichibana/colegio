<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table="nota";
    protected $fillable=[
        'nota_ser',
        'nota_saber',
        'nota_hacer',
        'nota_decidir',
        'id_bimestre',
        'id_aCursoEstudiante'
    ];
    public $timestamp=false;
    public function acursoestudiante(){
        return $this->belongsTo(aCursoEstudiante::class, 'id_aCursoEstudiante');
    }
}
