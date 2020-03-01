<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProveedorTelefono;

class ProveedorTelefonoController extends Controller
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
    public function store()
    {
        $rut = request('rut');
        $verificacion = ProveedorTelefono::where('proveedor_rut','=',$rut)->first();
    
        if(empty($verificacion)){ //insert
            $tele = array();
            array_push($tele,request('tel-comercial'),request('tel-admin'),request('tel-supp'));
            $incremento = 1;
            foreach ($tele as $val) {
                $telefono = new ProveedorTelefono;
                $telefono->proveedor_rut = $rut;
                $telefono->telefono = $val;
                $telefono->tipo_contacto_id = $incremento++;
                $telefono->save();
            }
            
            return redirect()->route('home')->with('success','¡Actualización de Perfil exitosa!');
        }else{ //update
            $tele = array();
            array_push($tele,request('tel-comercial'),request('tel-admin'),request('tel-supp'));

            foreach ($tele as $val) {
                $telefono = ProveedorTelefono::where('proveedor_rut','=',$rut)->first();
                $telefono->proveedor_rut = $rut;
                $telefono->telefono = $val;
                $telefono->save();
            }
        }

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
