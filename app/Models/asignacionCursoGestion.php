<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignacionCursoGestion extends Model
{
    protected $table = 'asignacioncursogestion';
    protected $fillable=[
        'id_curso',
        'id_gestion',
        'id_paralelo'
    ];
    public $timestamps=false;

    public function paralelo(){
        return $this->belongsTo(Paralelo::class, 'id_paralelo');
    }

}