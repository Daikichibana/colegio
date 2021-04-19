<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table="Inscripcion";
    protected $fillable=[
        'nombre'
    ];
    public $timestamp=false;
}
