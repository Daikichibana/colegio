<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable=[
        'nombre'
    ];
    public $timestamps=false;

    public function gestion()
    {
        return $this->belongsToMany(Gestion::class, 'asigancioncursogestion', 'id_curso','id_gestion');
    }
    protected $table = 'curso';
}
