<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table='estudiante';
    protected $fillabel=[
        'nombre',
        'apellidos',
        'direccion',
        'telefono'
    ];
    public $timestamps = false;
}
