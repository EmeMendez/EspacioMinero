<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MineraCorreo;

class MineraCorreoController extends Controller
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
    public function update()
    {
        $rut = auth()->guard('admin')->user()->rut;
        //$telefono =  ProveedorTelefono::where("proveedor_rut","=",$rut)->get();

        $correo1 = request('correo-1');
        $correo2 = request('correo-2');
        $correo3 = request('correo-3');
   

        MineraCorreo::where('tipo_contacto_id', 1)
                    ->where('minera_rut', $rut)
                    ->update(['email' => $correo1]);

        MineraCorreo::where('tipo_contacto_id', 2)
                    ->where('minera_rut', $rut)
                    ->update(['email' => $correo2]);
                    
        MineraCorreo::where('tipo_contacto_id', 3)
                    ->where('minera_rut', $rut)     
                    ->update(['email' => $correo3]);          
                    
                    
                         

        return redirect()->route('home')->with('success','¡Actualización Exitosa!'); 
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
