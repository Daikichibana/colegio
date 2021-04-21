<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoderado;

class ApoderadoController extends Controller
{
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $apoderado=Apoderado::all();
        }
        else {
            $apoderado=Apoderado::where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $apoderado;
    }
}
