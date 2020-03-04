<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProveedorTelefono;
use App\Proveedor;
use App\Ciudad;
use App\TamanioEmpresa;
use App\Categoria;
use App\ProveedorCorreo;

class ProveedorTelefonoController extends Controller
{

    protected $ciudades= null;
    protected $categorias = null;
    protected $tamanio_empresa = null;
    protected $proveedor = null;
    protected $correosh = null;
    protected $telefono = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

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
        $rut = auth()->user()->rut;
        $url = auth()->user()->url;

        $telefono1 = request('tel-1');
        $telefono2 = request('tel-2');
        $telefono3 = request('tel-3');
   

        ProveedorTelefono::where('tipo_contacto_id', 1)
                    ->where('proveedor_rut', $rut)
                    ->update(['telefono' => $telefono1]);

        ProveedorTelefono::where('tipo_contacto_id', 2)
                    ->where('proveedor_rut', $rut)
                    ->update(['telefono' => $telefono2]);
                    
        ProveedorTelefono::where('tipo_contacto_id', 3)
                    ->where('proveedor_rut', $rut)     
                    ->update(['telefono' => $telefono3]);          
                    
        $this->getInformation($url);
        return redirect()->route('proveedor.edit',[$this->proveedor])->with('success','¡Actualizacion Exitosa!');

                         
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
        $this->ciudades  = ciudad::get();
        $this->categorias = Categoria::get();
        $this->tamanio_empresa = TamanioEmpresa::get();
        $this->proveedor = Proveedor::join("ciudad","ciudad.id", "=", "proveedor.ciudad_id")
                              ->join("tamanio_empresa","tamanio_empresa.id","=","proveedor.tamanio_empresa_id")
                              ->join("categoria","categoria.id","=","proveedor.categoria_id")
                              ->select("rut","proveedor.nombre as nombre","sitio_web","direccion","url","descripcion","ciudad.nombre as ciudad","tamanio_empresa.nombre as tamanio_empresa","categoria.nombre as categoria","imagen","ciudad_id","tamanio_empresa_id","categoria_id")
                              ->where("url", "=", $url)->first();
         
        $this->telefono = ProveedorTelefono::join("proveedor","proveedor.rut", "=", "proveedor_telefono.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_telefono.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"telefono","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();

        $this->correosh = ProveedorCorreo::join("proveedor","proveedor.rut", "=", "proveedor_correo.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"proveedor_correo.correo","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();                              
    }
}
