<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

use App\Proveedor;
use App\Ciudad;
use App\TamanioEmpresa;
use App\Categoria;
use App\ProveedorTelefono;
use App\ProveedorCorreo;
use App\ProveedorCertificacion;
use App\ProveedorTag;
use DB;

class ProveedorController extends Controller
{
    protected $ciudades= null;
    protected $categorias = null;
    protected $tamanio_empresa = null;
    protected $proveedor = null;
    protected $correosh = null;
    protected $telefono = null;

    public function __construct()
    {
        $this->middleware('auth')->except('index','show','create','filter','store','recursos');
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

        function quitar_tildes($cadena) {
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $texto = str_replace($no_permitidas, $permitidas ,$cadena);
            return $texto;
        }
    /**
     * Para guardar el recurso desde el create(como un insert)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $paso1 = false;
        $paso2 = false;
        $paso3 = false;

        $proveedor = DB::select('select * from proveedor where rut = ?', [request('user-rut')]);
        $ciaminerauser = DB::select('select * from cia_minera_usuario where rut = ?', [request('user-rut')]); 
        $invitado = DB::select('select * from users where rut = ?', [request('user-rut')]); 
        $proveedor2 = DB::select('select * from proveedor where email = ?', [request('user-email')]);
        $ciaminerauser2 = DB::select('select * from cia_minera_usuario where email = ?', [request('user-email')]); 
        $invitado2 = DB::select('select * from users where email = ?', [request('user-email')]); 
        $proveedor3 = DB::select('select * from proveedor where nombre = ?', [request('user-name')]);
        $ciaminerauser3 = DB::select('select * from cia_minera_usuario where nombre_usuario = ?', [request('user-name')]); 
        $invitado3 = DB::select('select * from users where nombre = ?', [request('user-name')]); 
        
        if(count($proveedor) == 0 and count($ciaminerauser) == 0 and count($invitado) == 0  ){
            $paso1 = true;
            
            //return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre')->with('error3','error de email');
        }
        
        if(count($proveedor2) == 0 and count($ciaminerauser2) == 0 and count($invitado2) == 0){
            $paso3 = true;
        }
        if(count($proveedor3) == 0 and count($ciaminerauser3) == 0 and count($invitado3) == 0){
            $paso2 = true;
        }
        
        if($paso1 == false or $paso2 == false or $paso3 == false){
            if(!$paso1){
                if(!$paso2){
                    if(!$paso3){
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre')->with('error3','error de email');
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre');
                    }
                }
                else{
                    if(!$paso3){
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error3','error de nombre');
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
            }
            else{
                if(!$paso2){
                    if(!$paso3){
                        return back()->with('error2','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error3','¡Actualizacion Erronea! Algo ha salido mal');
                    }
                    else{
                        return back()->with('error2','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
                else{
                    if(!$paso3){
                        return back()->with('error3','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
            }

        }
        else{

                
        $p = new Proveedor;
        
        

        $p->rut                = request('user-rut');
        $p->nombre             = request('user-name');
        $p->sitio_web          = request('user-sitio');
        $p->descripcion        = request('user-descripcion');
        $p->direccion          = request('user-address');
        $p->password           = bcrypt(request('user-pass'));
        $p->categoria_id       = request('user-cat');
        $p->ciudad_id          = request('user-city');
        $p->email              = request('user-email');
        $p->tamanio_empresa_id = request('user-tamanio');
        $p->estado_id          = request('user-status');
        $p->url                = str_replace(" ","-",strtolower($this->quitar_tildes(request('user-name'))));
        $p->imagen             = 'images/avatars/proveedor/default-avatar.png';
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
                $miCorreito->email = $val;
                $miCorreito->tipo_contacto_id = $incremento++;
                $miCorreito->save();
            }

        $this->notificacion(request('user-rut'),request('user-name'),request('user-email'));  
            
        return redirect()->route('session')->with('success','¡Registro Existoso! Inicie Sesión para continuar');

                
            
        }
    
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
        ->select('tipo_contacto.descripcion as des',"proveedor_correo.email as email","proveedor_rut","tipo_contacto_id as tipo_id","proveedor.nombre as nombre","proveedor.url as url")
        ->where("proveedor_rut", "=", $url->rut)->get();  
        
       

        $telefono = ProveedorTelefono::join("proveedor","proveedor.rut", "=", "proveedor_telefono.proveedor_rut")
        ->join("tipo_contacto","tipo_contacto.id","=","proveedor_telefono.tipo_contacto_id")
        ->select('tipo_contacto.descripcion as des',"telefono","proveedor_rut","tipo_contacto_id as tipo_id")
        ->where("proveedor_rut", "=", $url->rut)->get();

        $certificacion = ProveedorCertificacion::join("proveedor","proveedor.rut", "=", "proveedor_certificacion.proveedor_rut")
        ->join("certificacion","certificacion.id","=","proveedor_certificacion.certificacion_id")
        ->select("certificacion.nombre")
        ->where("proveedor_rut", "=", $url->rut)->get();

        $proveedor_tags = ProveedorTag::join("tag","tag.id","=","proveedor_tag.tag_id")
                                        ->select('tag.nombre as nombre','tag_id')
                                        ->where('proveedor_rut', $url->rut)->get();
        
        

        return view('proveedor.show',['proveedor'=>$proveedor, 'correo'=>$correosh, 'certificacion'=>$certificacion, 'telefono'=>$telefono, 'tags'=>$proveedor_tags]);                                 
                            

    }

    /**
     * Mostrar el formulario para editar un proveedor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $this->getInformation($url);
        return view('proveedor.edit',['categorias' => $this->categorias,'ciudades'=>$this->ciudades,'tamanio_empresa'=>$this->tamanio_empresa,'proveedor'=>$this->proveedor, 'telefono'=>$this->telefono, 'correo'=>$this->correosh]);
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
        $proveedor->email             = request('user-email');
        $proveedor->tamanio_empresa_id = request('user-tamanio');
        $proveedor->url                = str_replace(" ","-",strtolower($this->quitar_tildes(request('user-name'))));



        $nueva_url = str_replace(" ","-",strtolower($this->quitar_tildes(request('user-name'))));

        $proveedor->save();
        $this->getInformation($nueva_url);
        return redirect()->route('proveedor.edit',[$this->proveedor])->with('success','¡Actualizacion Exitosa!');
    }


    public function changepassword(){

        $rut = auth()->user()->rut;
        $url = auth()->user()->url;
        $proveedor =  Proveedor::where("rut","=", $rut)->first();

        $passwordAnterior = $proveedor->password;
        $passwordAnteriorForm = request('user-pass-be');
        $passwordNueva = Hash::make(request('user-password'));

        if (Hash::check($passwordAnteriorForm, $passwordAnterior)) {
            Proveedor::where('rut', $rut)
                    ->update(['password' => $passwordNueva]);  
        $this->getInformation($url);
        return redirect()->route('proveedor.edit',[$this->proveedor])->with('success','¡Actualizacion Exitosa!');
                    
        }else{
            $this->getInformation($url);
            return redirect()->route('proveedor.edit',[$this->proveedor])->with('error','¡Actualizacion Erronea! Algo ha salido mal');
        }

    }





    public function update_imagen(Request $r){
        $url = auth()->user()->url;
        $old_image = auth()->user()->imagen;
        if($r->hasFile('user-imagen')){
            $image = Storage::disk('public')->put('/images/avatars/proveedor',$r->file('user-imagen'));
            if($old_image != 'images/avatars/proveedor/default-avatar.png'){
                unlink(public_path() . '/'.$old_image);
            }
            Proveedor::where('url', $url)
                    ->update(['imagen' => $image]);  
            $this->getInformation($url);
            return redirect()->route('proveedor.edit',[$this->proveedor])->with('success','¡Actualizacion Exitosa!'); 
        }else{
            $this->getInformation($url);
        return redirect()->route('proveedor.edit',[$this->proveedor])->with('error','¡Actualizacion Exitosa!'); 
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

    public function notificacion($rut,$nombre,$email){

        $to = '';

        Mail::to($to)->queue(new Notification($rut,$nombre,$email));


    }

    public function recursos(){
        return view('proveedor.recursos');
    }

    public function getInformation($url){
        $this->ciudades  = ciudad::get();
        $this->categorias = Categoria::get();
        $this->tamanio_empresa = TamanioEmpresa::get();
        $this->proveedor = Proveedor::join("ciudad","ciudad.id", "=", "proveedor.ciudad_id")
                              ->join("tamanio_empresa","tamanio_empresa.id","=","proveedor.tamanio_empresa_id")
                              ->join("categoria","categoria.id","=","proveedor.categoria_id")
                              ->select("rut","proveedor.nombre as nombre","sitio_web","direccion","url","email","descripcion","ciudad.nombre as ciudad","tamanio_empresa.nombre as tamanio_empresa","categoria.nombre as categoria","imagen","ciudad_id","tamanio_empresa_id","categoria_id")
                              ->where("url", "=", $url)->first();
         
        $this->telefono = ProveedorTelefono::join("proveedor","proveedor.rut", "=", "proveedor_telefono.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_telefono.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"telefono","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();

        $this->correosh = ProveedorCorreo::join("proveedor","proveedor.rut", "=", "proveedor_correo.proveedor_rut")
                              ->join("tipo_contacto","tipo_contacto.id","=","proveedor_correo.tipo_contacto_id")
                              ->select('tipo_contacto.descripcion as des',"proveedor_correo.email","proveedor_rut","tipo_contacto_id as tipo_id")
                              ->where("proveedor_rut", "=", auth()->user()->rut)->get();                              
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $parameter
     * @return \Illuminate\Http\Response
     */
     public function filter(Request $request,$parameter){
        $array = $request->get('toSearch');
        $categoria = $request->get('categoria');
        $region = $request->get('region');
        $tamanio_empresa = $request->get('tamanio_empresa');

        if($parameter == 'all'){
            $proveedores = Proveedor::join('ciudad','ciudad.id','=','proveedor.ciudad_id')           
                                    ->join('categoria','categoria.id','=','proveedor.categoria_id')
                                    ->join('tamanio_empresa','tamanio_empresa.id','=','proveedor.tamanio_empresa_id')
                                    ->join('proveedor_tag','proveedor_tag.proveedor_rut','=','proveedor.rut')
                                    ->join('tag','tag.id','=','proveedor_tag.tag_id')
                                    ->select('rut','url','proveedor.nombre as nombre','descripcion','ciudad.nombre as ciudad_nombre','imagen')
                                    ->distinct('rut')->paginate(10);            
        }
        else{  
            $proveedores = Proveedor::join('ciudad','ciudad.id','=','proveedor.ciudad_id')
                                    ->join('provincias','provincias.id','=','ciudad.provincia_id')
                                    ->join('regiones','regiones.id','=','provincias.region_id')           
                                    ->join('categoria','categoria.id','=','proveedor.categoria_id')
                                    ->join('tamanio_empresa','tamanio_empresa.id','=','proveedor.tamanio_empresa_id')
                                    ->join('proveedor_tag','proveedor_tag.proveedor_rut','=','proveedor.rut')
                                    ->join('tag','tag.id','=','proveedor_tag.tag_id')
                                    ->select('rut','url','proveedor.nombre as nombre','descripcion','ciudad.nombre as ciudad_nombre','imagen')
                                    ->categoria($categoria)
                                    ->region($region)
                                    ->tamanio($tamanio_empresa)
                                    ->tag($array)
                                    ->distinct('rut')->paginate(10);
        }
        return ['pagination' => [
                'total' => $proveedores->total(),
                'current_page' => $proveedores->currentPage(),
                'per_page' => $proveedores->perPage(),
                'last_page' => $proveedores->lastPage(),
                'from' => $proveedores->firstItem(),
                'to' => $proveedores->lastPage(),
                ],
                'proveedores' => $proveedores];    
    }


}

