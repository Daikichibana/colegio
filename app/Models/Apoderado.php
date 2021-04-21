<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table='apoderado';
    protected $fillable=[
        'nombre',
        'apellidos',
        'telefono',
        'relacion'
    ];
    public $timestamps=false;
}
