<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asignacionCursoGestion;
use DB;

class AsignacionCursoGestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // $aCursoGestion=DB::table('asignacioncursogestion')
    //     // ->join('gestion', 'id_gestion', '=', 'gestion.id')
    //     // ->join('curso', 'id_curso', '=', 'curso.id')
    //     // ->select('asignacioncursogestion.*')
    //     // ->get();
        
    //     $aCursoGestion=asignacionCursoGestion::all();
    //     return ['asignacionCursoGestion'=>$aCursoGestion];
    // }
    public function index(Request $request){

        $buscar= $request->buscar;
        if($buscar==''){
            $s=DB::table('asignacioncursogestion')
            ->join('gestion', 'id_gestion', '=', 'gestion.id')
            ->join('curso', 'id_curso', '=', 'curso.id')
            ->join('paralelo', 'id_paralelo', '=', 'paralelo.id')
            ->select('asignacioncursogestion.id',  
                        'curso.nombre as curso_nombre', 
                        'gestion.nombre as gestion_nombre',
                        'paralelo.nombre as paralelo_nombre'
                    )
            ->orderBy('id', 'asc')
            ->get();
        }

        else{
             $s=DB::table('asignacioncursogestion')
             ->join('gestion', 'id_gestion', '=', 'gestion.id')
             ->join('curso', 'id_curso', '=', 'curso.id')
             ->join('paralelo', 'id_paralelo', '=', 'paralelo.id')
             ->select('asignacioncursogestion.id',  
                         'curso.nombre as curso_nombre', 
                         'gestion.nombre as gestion_nombre',
                         'paralelo.nombre as paralelo_nombre'
                     )
             ->where('curso.nombre','like','%'.$buscar.'%')
             ->orderBy('id', 'asc')
             ->get();
        }
        return $s;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
