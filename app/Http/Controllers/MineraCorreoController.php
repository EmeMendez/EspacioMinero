<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MineraCorreo;
use App\CiaMineraUsuario;
use App\MineraTelefono;

class MineraCorreoController extends Controller
{

    protected $minera = null;
    protected $correosh = null;
    protected $telefono = null;

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
        $url = auth()->guard('admin')->user()->url;

        $correo1 = request('correo-1');
        $correo2 = request('correo-2');
        $correo3 = request('correo-3');
   

        MineraCorreo::where('tipo_contacto_id', 1)
                    ->where('minera_rut', $rut)
                    ->update(['correo' => $correo1]);

        MineraCorreo::where('tipo_contacto_id', 2)
                    ->where('minera_rut', $rut)
                    ->update(['correo' => $correo2]);
                    
        MineraCorreo::where('tipo_contacto_id', 3)
                    ->where('minera_rut', $rut)     
                    ->update(['correo' => $correo3]);          
                    
        $this->getInformation($url);
        return redirect()->route('minera.edit',[$this->minera->url])->with('success','¡Actualizacion Exitosa!'); 
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

    public function getInformation($url){
        $this->minera = CiaMineraUsuario::join("cia_minera","cia_minera.id", "=", "cia_minera_usuario.cia_minera_id")
                              ->join("estado","estado.id","=","cia_minera_usuario.estado_id")
                              ->join("usuario_tipo","usuario_tipo.id","=","cia_minera_usuario.usuario_tipo")
                              ->select("rut","cia_minera_usuario.nombre_usuario as nombre","sitio_web","url","imagen","cia_minera.nombre as nombreminera","estado.nombre as nombreestado","usuario_tipo.nombre as usuariotipo","cia_minera_usuario.cia_minera_id","cia_minera_usuario.estado_id","cia_minera_usuario.usuario_tipo")
                              ->where("url", "=", $url)->first();
         
        $this->telefono = MineraTelefono::join("cia_minera_usuario","cia_minera_usuario.rut", "=", "minera_telefono.minera_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","minera_telefono.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"telefono","cia_minera_usuario.rut","tipo_contacto_id as tipo_id")
                              ->where("minera_rut", "=", auth()->guard('admin')->user()->rut)->get();

        $this->correosh = MineraCorreo::join("cia_minera_usuario","cia_minera_usuario.rut", "=", "minera_correo.minera_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","minera_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"minera_correo.correo","minera_rut","tipo_contacto_id as tipo_id")
                              ->where("minera_rut", "=", auth()->guard('admin')->user()->rut)->get();                                 
    }
}
