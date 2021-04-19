<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
class InscripcionController extends Controller
{

    public function index()
    {
        $inscripcion = Inscripcion::all();
        return ['Inscripcion'=>$inscripcion];
    }

    public function store(Request $request)
    {
        $inscripcion = new Inscripcion;
        $inscripcion->nombre = $request->nombre;
        $inscripcion->save();
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
