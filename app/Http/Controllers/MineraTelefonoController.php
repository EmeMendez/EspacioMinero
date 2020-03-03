<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MineraTelefono;

class MineraTelefonoController extends Controller
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
        $telefono1 = request('tel-1');
        $telefono2 = request('tel-2');
        $telefono3 = request('tel-3');
   

        MineraTelefono::where('tipo_contacto_id', 1)
                    ->where('minera_rut', $rut)
                    ->update(['telefono' => $telefono1]);

        MineraTelefono::where('tipo_contacto_id', 2)
                    ->where('minera_rut', $rut)
                    ->update(['telefono' => $telefono2]);
                    
        MineraTelefono::where('tipo_contacto_id', 3)
                    ->where('minera_rut', $rut)     
                    ->update(['telefono' => $telefono3]);          
                    
                    
                         

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
