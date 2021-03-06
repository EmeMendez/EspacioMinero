<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProveedorCertificacion;
class ProveedorCertificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pc = new ProveedorCertificacion;
        $pc->proveedor_rut = $request->proveedor_rut;
        $pc->certificacion_id = $request->certificacion_id;
        $pc->save();
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rut = auth()->user()->rut;
        $certificaciones = ProveedorCertificacion::join("certificacion","certificacion.id", "=", "proveedor_certificacion.certificacion_id")
                                ->select('nombre',"certificacion_id","proveedor_rut")
                                ->where("proveedor_rut", "=", $rut  )->get();                              
        return ['certificaciones' => $certificaciones, 'rut' => $rut];
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
    public function update(Request $request)
    {
        
        //return $request;
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProveedorCertificacion::where("proveedor_rut","=",$request->proveedor_rut)
                                ->where("certificacion_id", "=", $request->certificacion_id)
                                ->delete();
        return $request;
        
    }
}
