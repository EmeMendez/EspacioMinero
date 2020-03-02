<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Proveedor;
use App\Ciudad;
use App\TamanioEmpresa;
use App\Categoria;
use App\ProveedorTelefono;
use App\ProveedorCorreo;

class ProveedorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index','show','create','getProveedoresByName','store');
    }

    /**
     * Sirve para listar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::get();
        return view('proveedor.index',compact('proveedor'));
    }


    public function getProveedoresByName($parameter)
    {
        if($parameter =='*'){
            $proveedor = Proveedor::orderBy('nombre','ASC')->paginate(10);
        }
        else{
            $proveedor = Proveedor::where('nombre','LIKE', '%' . $parameter . '%')->orderBy('nombre','ASC')->paginate(10);
        }
        return ['pagination' => [
                 'total' => $proveedor->total(),
                 'current_page' => $proveedor->currentPage(),
                 'per_page' => $proveedor->perPage(),
                 'last_page' => $proveedor->lastPage(),
                 'from' => $proveedor->firstItem(),
                 'to' => $proveedor->lastPage(),
                 ],
                'proveedores' => $proveedor];
        
    }
    /**
     * Mostrar el formulario para crear un nuevo proveedor 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()){
            return redirect()->route('home');
        }else{
            
            $ciudad = Ciudad::get();
            $tamanioempresa = TamanioEmpresa::get();
            $categoria = Categoria::get();
            return view('proveedor.create',compact('ciudad','tamanioempresa','categoria'));
        }

    }
    /**
     * Para guardar el recurso desde el create(como un insert)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //$r->file('user-imagen')->store('public');
        $p = new Proveedor;
        

        

        $p->rut                = request('user-rut');
        $p->nombre             = request('user-name');
        $p->sitio_web          = request('user-sitio');
        $p->descripcion        = request('user-descripcion');
        $p->direccion          = request('user-address');
        $p->password           = bcrypt(request('user-pass'));
        $p->categoria_id       = request('user-cat');
        $p->ciudad_id          = request('user-city');
        $p->correo             = request('user-email');
        $p->tamanio_empresa_id = request('user-tamanio');
        $p->estado_id          = request('user-status');
        $p->url                = str_replace(" ","-",strtolower(request('user-name')));
        $p->imagen             = 'public/default-avatar-image.png';
        $p->save();

        $tele = array();
            array_push($tele,'','','');
            $incremento = 1;
            foreach ($tele as $val) {
                $telefono = new ProveedorTelefono;
                $telefono->proveedor_rut = request('user-rut');
                $telefono->telefono = $val;
                $telefono->tipo_contacto_id = $incremento++;
                $telefono->save();
            }

            $correosh = array();
            array_push($correosh,'','','');
            $incremento = 1;
            foreach ($correosh as $valo) {
                $miCorreito = new ProveedorCorreo;
                $miCorreito->proveedor_rut = request('user-rut');
                $miCorreito->correo = $val;
                $miCorreito->tipo_contacto_id = $incremento++;
                $miCorreito->save();
            }

        return redirect()->route('session')->with('success','¡Registro Existoso! Inicie Sesión para continuar');



    }

    /**
     * Se muestra un recurso especifico por ejemplo por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $url)
    {
        $proveedor = Proveedor::join("ciudad","ciudad.id", "=", "proveedor.ciudad_id")
                              ->join("tamanio_empresa","tamanio_empresa.id","=","proveedor.tamanio_empresa_id")
                              ->join("categoria","categoria.id","=","proveedor.categoria_id")
                              ->select("rut","proveedor.nombre as nombre","sitio_web","direccion","url","descripcion","ciudad.nombre as ciudad","tamanio_empresa.nombre as tamanio_empresa","categoria.nombre as categoria","imagen")
                              ->where("url", "=", $url->url)->first();
      
                              $correosh = ProveedorCorreo::join("proveedor","proveedor.rut", "=", "proveedor_correo.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"proveedor_correo.correo","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", $url->rut)->get();                               

        return view('proveedor.show',['proveedor'=>$proveedor, 'correo'=>$correosh]);                              

    }

    /**
     * Mostrar el formulario para editar un proveedor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $ciudades  = ciudad::get();
        $categorias = Categoria::get();
        $tamanio_empresa = TamanioEmpresa::get();
        $proveedor = Proveedor::join("ciudad","ciudad.id", "=", "proveedor.ciudad_id")
                              ->join("tamanio_empresa","tamanio_empresa.id","=","proveedor.tamanio_empresa_id")
                              ->join("categoria","categoria.id","=","proveedor.categoria_id")
                              ->select("rut","proveedor.nombre as nombre","sitio_web","direccion","url","descripcion","ciudad.nombre as ciudad","tamanio_empresa.nombre as tamanio_empresa","categoria.nombre as categoria","imagen","ciudad_id","tamanio_empresa_id","categoria_id")
                              ->where("url", "=", $url)->first();
         
        $telefono = ProveedorTelefono::join("proveedor","proveedor.rut", "=", "proveedor_telefono.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_telefono.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"telefono","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();

         $correosh = ProveedorCorreo::join("proveedor","proveedor.rut", "=", "proveedor_correo.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"proveedor_correo.correo","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();                              

        return view('proveedor.edit',['categorias' => $categorias,'ciudades'=>$ciudades,'tamanio_empresa'=>$tamanio_empresa,'proveedor'=>$proveedor, 'telefono'=>$telefono, 'correo'=>$correosh]);
    }

    /**
     * Edita un proveedor desde el metodo edit es decir este es el update propiamente tal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        $proveedor =  Proveedor::where("rut","=", request('user-rut'))->first();


        $ciudades  = ciudad::get();
        $categorias = Categoria::get();
        $tamanio_empresa = TamanioEmpresa::get();

        $proveedor->nombre             = request('user-name');
        $proveedor->sitio_web          = request('user-sitio');
        $proveedor->descripcion        = request('user-descripcion');
        $proveedor->direccion          = request('user-address');
        $proveedor->categoria_id       = request('user-cat');
        $proveedor->ciudad_id          = request('user-city');
        $proveedor->correo             = request('user-email');
        $proveedor->tamanio_empresa_id = request('user-tamanio');
        $proveedor->url                = str_replace(" ","-",strtolower(request('user-name')));


        $nueva_url = $proveedor->url;

        $proveedor->save();

        return redirect()->route('home')->with('success','¡Actualización Exitosa!');   
        
    }

    public function update_imagen(Request $r){

        $rut = auth()->user()->rut;
        if($r->hasFile('user-imagen')){
            $imagen = $r->file('user-imagen')->store('public');
            Proveedor::where('rut', $rut)
                    ->update(['imagen' => $imagen]);  
                    return redirect()->route('home')->with('success','¡Imágen actualizada exitosamente!');   
                   

        }else{
            return redirect()->route('home')->with('error','No se puedo actualizar la imágen');   
        }
       

    }

    public function image(){
        $rut = auth()->user()->rut;
        $imagen = Proveedor::find($rut);
        return $imagen->imagen;
    }

    /**
     * Elimina un recurso especifico por identificador (proveedor)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function recursos(){
        return view('proveedor.recursos');
    }
}
