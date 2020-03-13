<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CiaMineraUsuario;
use App\MineraTelefono;
use App\MineraCorreo;

class CiaMineraUsuarioController extends Controller
{

    protected $minera = null;
    protected $correosh = null;
    protected $telefono = null;
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
    public function edit($url)
    {
        $minera = CiaMineraUsuario::join("cia_minera","cia_minera.id", "=", "cia_minera_usuario.cia_minera_id")
                              ->join("estado","estado.id","=","cia_minera_usuario.estado_id")
                              ->join("usuario_tipo","usuario_tipo.id","=","cia_minera_usuario.usuario_tipo")
                              ->select("rut","cia_minera_usuario.nombre_usuario as nombre","sitio_web","url","imagen","cia_minera.nombre as nombreminera","estado.nombre as nombreestado","usuario_tipo.nombre as usuariotipo","cia_minera_usuario.cia_minera_id","cia_minera_usuario.estado_id","cia_minera_usuario.usuario_tipo")
                              ->where("url", "=", $url)->first();
         
        $telefono = MineraTelefono::join("cia_minera_usuario","cia_minera_usuario.rut", "=", "minera_telefono.minera_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","minera_telefono.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"telefono","cia_minera_usuario.rut","tipo_contacto_id as tipo_id")
                              ->where("minera_rut", "=", auth()->guard('admin')->user()->rut)->get();

         $correosh = MineraCorreo::join("cia_minera_usuario","cia_minera_usuario.rut", "=", "minera_correo.minera_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","minera_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"minera_correo.correo","minera_rut","tipo_contacto_id as tipo_id")
                              ->where("minera_rut", "=", auth()->guard('admin')->user()->rut)->get();                              

        return view('minera.edit',['minera'=>$minera, 'telefono'=>$telefono, 'correo'=>$correosh]);
    
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
        $minera =  CiaMineraUsuario::where("rut","=", request('user-rut'))->first();



        $minera->nombre_usuario     = request('user-name');
        $minera->sitio_web          = request('user-sitio');
        $minera->url                = str_replace(" ","-",strtolower(request('user-name')));


        $minera->save();
        $this->getInformation($minera->url);
        return redirect()->route('minera.edit',[$this->minera->url])->with('success','¡Actualizacion Exitosa!');
    }
    

    public function update_imagen(Request $r){
        $url = auth()->guard('admin')->user()->url;
        $old_image = auth()->guard('admin')->user()->imagen;
        if($r->hasFile('user-imagen')){
            $image = Storage::disk('public')->put('/images/avatars/minera',$r->file('user-imagen'));
            if($old_image != 'images/avatars/minera/default-avatar.png'){
                unlink(public_path() . '/'.$old_image);
            }
            CiaMineraUsuario::where('url', $url)
                    ->update(['imagen' => $image]);  
            $this->getInformation($url);
        return redirect()->route('minera.edit',[$this->minera->url])->with('success','¡Actualizacion Exitosa!'); 
        }else{
            $this->getInformation($url);
        return redirect()->route('minera.edit',[$this->minera->url])->with('error','¡Actualizacion Exitosa!'); 
            
        }
       

    }

    public function image(){
        $rut = auth()->guard('admin')->user()->rut;
        $imagen = CiaMineraUsuario::find($rut);
        return $imagen->imagen;
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