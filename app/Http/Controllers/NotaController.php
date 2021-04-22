<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        $apellido= $request->apellido;
        if($buscar!='' || $apellido!=''){
            $s=DB::table('nota')
            ->join('asignacioncursoestudiante', 'id_aCursoEstudiante', '=', 'asignacioncursoestudiante.id')
            ->join('estudiante', 'id_estudiante', '=', 'estudiante.id')
            ->join('asignacioncursodocente', 'id_aCursoDocente', '=', 'asignacioncursodocente.id')
            ->join('asignacioncursomateria', 'id_aCursoMateria', '=', 'asignacioncursomateria.id')
            ->join('asignacioncursogestion', 'id_acursogestion', '=', 'asignacioncursogestion.id')
            ->join('gestion', 'id_gestion', '=', 'gestion.id')
            ->join('materia', 'id_materia', '=', 'materia.id')
            ->select('estudiante.nombre as Estudiante',
                    'estudiante.apellidos as Apellidos',
                    'materia.nombre as Materia',
                    'gestion.nombre as Gestion',
                    'nota.nota_ser',
                    'nota.nota_saber',
                    'nota.nota_hacer',
                    'nota.nota_decidir')
            ->where('estudiante.nombre','like',$buscar.'%')
            ->where('estudiante.apellidos','like',$apellido.'%')
            ->get();
        }
        // else{
        //     $s=DB::table('nota')
        //     ->join('asignacioncursoestudiante', 'id_aCursoEstudiante', '=', 'asignacioncursoestudiante.id')
        //     ->join('estudiante', 'id_estudiante', '=', 'estudiante.id')
        //     ->join('asignacioncursodocente', 'id_aCursoDocente', '=', 'asignacioncursodocente.id')
        //     ->join('asignacioncursomateria', 'id_aCursoMateria', '=', 'asignacioncursomateria.id')
        //     ->join('asignacioncursogestion', 'id_acursogestion', '=', 'asignacioncursogestion.id')
        //     ->join('gestion', 'id_gestion', '=', 'gestion.id')
        //     ->join('materia', 'id_materia', '=', 'materia.id')
        //     ->select('estudiante.nombre as Estudiante',
        //             'estudiante.apellidos as Apellidos',
        //             'materia.nombre as Materia',
        //             'gestion.nombre as Gestion',
        //             'nota.nota_ser',
        //             'nota.nota_saber',
        //             'nota.nota_hacer',
        //             'nota.nota_decidir')
        //     ->get();
        // }
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