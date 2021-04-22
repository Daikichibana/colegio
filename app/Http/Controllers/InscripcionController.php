<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\detalleInscripcion;

use DB;
class InscripcionController extends Controller
{

    public function index(Request $request)
    {

        $buscar = $request->buscar;
        if($buscar==''){
            $inscripcion = DB::table('inscripcion')
            ->join('estudiante','inscripcion.id_estudiante', '=', 'estudiante.id')
            ->join('asignacioncursogestion','inscripcion.id_aCursoGestion', '=', 'asignacioncursogestion.id')
            ->join('curso','asignacioncursogestion.id_curso', '=', 'curso.id')
            ->join('gestion','asignacioncursogestion.id_gestion', '=', 'gestion.id')
            ->select('inscripcion.id','inscripcion.fechaInscripcion','inscripcion.id_aCursoGestion as idCurso',
            'curso.nombre as cursoNombre','gestion.nombre as cursoGestion','estudiante.id as idEstudiante', 
            'estudiante.nombre as estudianteNombre','estudiante.apellidos as estudianteApellidos')
            ->orderBy('inscripcion.id','desc')
            ->get();
        }
        else{
            $inscripcion = DB::table('inscripcion')
            ->join('estudiante','inscripcion.id_estudiante', '=', 'estudiante.id')
            ->join('asignacioncursogestion','inscripcion.id_aCursoGestion', '=', 'asignacioncursogestion.id')
            ->join('curso','asignacioncursogestion.id_curso', '=', 'curso.id')
            ->join('gestion','asignacioncursogestion.id_gestion', '=', 'gestion.id')
            ->select('inscripcion.id','inscripcion.fechaInscripcion','inscripcion.id_aCursoGestion as idCurso',
            'curso.nombre as cursoNombre','gestion.nombre as cursoGestion','estudiante.id as idEstudiante', 
            'estudiante.nombre as estudianteNombre', 'estudiante.apellidos as estudianteApellidos')
            ->where('estudiante.nombre','like','%'.$buscar.'%')
            ->orderBy('inscripcion.id','desc')
            ->get();
        }
        return $inscripcion;
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();

            $inscripcion = new Inscripcion;
            $inscripcion->fechaInscripcion=$request->fecha;
            $inscripcion->id_aCursoGestion=$request->idCurso;
            $inscripcion->id_estudiante=$request->idEstudiante;
            $inscripcion->save();

            $detalles = $request->data;
            foreach($detalles as $ep=>$det){
                $detalle = new DetalleInscripcion();
                $detalle->id_inscripcion=$inscripcion->id;
                $detalle->id_apoderado=$det['idApoderado'];
                $detalle->relacion=$det['relacion'];
                $detalle->save();
            }
            DB::commit();
            return[
                'id'=>$inscripcion->id
            ];
        } catch (Exception $e){
            DB::rollBack();
        }
    }

    public function obtenerCabecera(Request $request){  
        $id=$request->id;

        $inscripcion = DB::table('inscripcion')
        ->join('estudiante','inscripcion.id_estudiante', '=', 'estudiante.id')
        ->join('asignacioncursogestion','inscripcion.id_aCursoGestion', '=', 'asignacioncursogestion.id')
        ->join('curso','asignacioncursogestion.id_curso', '=', 'curso.id')
        ->join('gestion','asignacioncursogestion.id_gestion', '=', 'gestion.id')
        ->select('inscripcion.id','inscripcion.fechaInscripcion','inscripcion.id_aCursoGestion as idCurso',
        'curso.nombre as cursoNombre','gestion.nombre as cursoGestion','estudiante.id as idEstudiante',
        'estudiante.nombre as estudianteNombre', 'estudiante.apellidos as estudianteApellidos')
        ->where('inscripcion.id','=',$id)
        ->get();
        return ['inscripcion'=>$inscripcion];
    }


    public function obtenerDetalles(Request $request){
        $id=$request->id;
        $detalle = DetalleInscripcion::join('apoderado','detalle_inscripcion.id_Apoderado','=','apoderado.id')
        ->select('detalle_inscripcion.id_Apoderado', 'detalle_inscripcion.relacion', 'apoderado.id as idApoderado', 
        'apoderado.nombre as apoderadoNombre', 'apoderado.apellidos as apoderadoApellidos', 'apoderado.telefono as apoderadoTelefono')
        ->where('detalle_inscripcion.id_inscripcion','=',$id)
        ->get();
        return['detalle' => $detalle];
    }
}
