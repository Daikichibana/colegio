<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use DB;
class InscripcionController extends Controller
{

    public function index(Request $request)
    {
        $buscar = $request->buscar;
        if($buscar==''){
            $venta = Venta::join('cliente','venta.id_cliente', '=', 'cliente.id')
            ->select('venta.id','venta.fecha','venta.monto','venta.estado','cliente.nombre','cliente.apellidos')
            ->orderBy('venta.id','desc')
            ->get();
        }
        else{
            $venta = Venta::join('cliente','venta.id_cliente', '=', 'cliente.id')
            ->select('venta.id','venta.fecha','venta.monto','venta.estado','cliente.nombre','cliente.apellidos')
            ->where('cliente.nombre','like','%'.$buscar.'%')
            ->orderBy('venta.id','desc')
            ->get();
        }
        return $venta;
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();

            $venta = new Venta;
            $venta->fecha=$request->fecha;
            $venta->monto=$request->monto;
            $venta->estado='Registrado';
            $venta->id_cliente=$request->id_cliente;
            $venta->save();

            $detalles = $request->data;
            foreach($detalles as $ep=>$det){
                $detalle = new DetalleVenta();
                $detalle->id_venta=$venta->id;
                $detalle->id_producto=$det['id_producto'];
                $detalle->preciov=$det['preciov'];
                $detalle->cantidad=$det['cantidad'];
                $detalle->save();
            }
            DB::commit();
            return[
                'id'=>$venta->id
            ];
        } catch (Exception $e){
            DB::rollBack();
        }
    }
}
