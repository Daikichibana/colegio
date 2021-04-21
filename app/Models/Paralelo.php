<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;
    protected $table = 'paralelo';

    public function asignacioncursogestion(){
        return $this->hasMany(asignacionCursogestion::class, 'id_paralelo');
    }
}
