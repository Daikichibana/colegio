<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoderado;
use App\Models\Inscripcion;
use DB;

class ApoderadoController extends Controller
{
    public function index(Request $request){

        $buscar= $request->buscar;
        if($buscar==''){
            $apoderado=Apoderado::all();
        }

        else{
            $apoderado=Apoderado::where('nombre','like','%'.$buscar.'%')->get();

        }
        return $apoderado;
    }
    public function store(Request $request){
        $apoderado=new Apoderado;
        $apoderado->nombre=$request->nombre;
        $apoderado->apellidos=$request->apellidos;
        $apoderado->telefono=$request->telefono;
        $apoderado->save();
    }
    public function update(Request $request){
        $apoderado=Apoderado::findOrFail($request->id);
        $apoderado->nombre=$request->nombre;
        $apoderado->apellidos=$request->apellidos;
        $apoderado->telefono=$request->telefono;
        $apoderado->save();
    }
    public function selectApoderado(Request $request){
        $filtro=$request->filtro;
        $apoderado= Apoderado::where('nombre','like','%'.$filtro.'%')
        ->select('id','nombre','apellidos','telefono','relacion')
        ->get();
        return $apoderado;
    }
}
