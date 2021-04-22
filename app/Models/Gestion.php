<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;
    protected $table = 'gestion';

    public function curso(){
        return $this->belongsToMany(Curso::class, 'asignacioncursogestion', 'id_gestion','id_curso');
    }
}
