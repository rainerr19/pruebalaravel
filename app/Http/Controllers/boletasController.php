<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boleta;
use App\Comprador;
use App\BoletaAsignada;

class boletasController extends Controller
{

    public function index()
    {
        // $count = bodega::selectRaw('bodegas.nombre as nombre_bodega,COUNT(productos.id_bodega) as cant')
        // ->leftJoin('productos','bodegas.id','productos.id_bodega')
        //     ->groupBy('nombre_bodega')
        // ->get();
        return Boleta::selectRaw('boletas.id,boletas.nombre_evento,boletas.descrip,boletas.fecha_cierre,boletas.limite, COUNT(boleta_asignadas.id_boleta) as asignados')
        ->leftJoin('boleta_asignadas','boletas.id','boleta_asignadas.id_boleta')
        ->where('boletas.estado','Activo')
            ->groupBy('boletas.id','boletas.nombre_evento','boletas.descrip','boletas.fecha_cierre','boletas.limite')
        ->get();
    }

    public function create(Request $request)
    {
        $boleta = new Boleta;
        $boleta->nombre_evento = $request->nombre_evento;
        $boleta->descrip = $request->descrip;
        $boleta->fecha_cierre = $request->fecha_cierre;
        $boleta->limite = $request->limite;
        $boleta->save();
        return $boleta;
    }


    public function create_comprador(Request $request)
    {
        $comprador = new Comprador;
        $comprador->nombres = $request->nombres;
        $comprador->apellidos = $request->apellidos;
        $comprador->cedula = $request->cedula;
        $comprador->save();
        return $comprador;
    }


    public function asignar(Request $request, $id_boleta)
    {
        $boleta = Boleta::find($id_boleta);
        if (empty($boleta)) {
            return 'boleta';
        }
        $comprador = Comprador::where('cedula',$request->cedula)->first();
        if (empty($comprador)) {
            return 'comprador';
        }
        $asignar = new BoletaAsignada;
        $asignar->id_comprador = $comprador->id;
        $asignar->id_boleta = $boleta->id;
        $asignar->save();
        return $asignar;
    }
    public function eliminar( $id_boleta)
    {
        $boleta = Boleta::find($id_boleta);
        if (empty($boleta)) {
            return 'no encontrado';
        }
        $boleta->estado = 'Eliminado';
        $boleta->update();
        return $boleta;
    }

}
