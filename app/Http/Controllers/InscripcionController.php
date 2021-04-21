<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use DB;
class InscripcionController extends Controller
{

    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $inscripcion=Inscripcion::all();
        }
        else{
           // $inscripcion=Inscripcion::where('nombre','like','%'.$buscar.'%')->get();
        }
        return $inscripcion;
    }

    public function store(Request $request){
      
    }
}
