<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use App\Mail\ContactMail;
use Auth;
use App\Match;
use App\MatchMinera;
use App\MatchProveedores;
use App\Soporte;

class CorreoController extends Controller
{

// MAIL_DRIVER=smtp
// MAIL_HOST=mail.espacioindustria.cl
// MAIL_PORT=587
// MAIL_USERNAME=no-reply@espacioindustria.cl
// MAIL_PASSWORD=proyectoCidere
// MAIL_ENCRYPTION=tls
// MAIL_FROM_ADDRESS=no-reply@espacioindustria.cl
// MAIL_FROM_NAME='Espacio Industrial Minero'


    public function send(){

        if(auth()->guard('admin')->check()){
            $m = new Match;
            $url = request('prov-url');
            $from =  auth()->guard('admin')->user()->email;
            $fromname = auth()->guard('admin')->user()->nombre_usuario;
            $sitio = auth()->guard('admin')->user()->sitio_web;
            $to = request('user-correo');
            $nombre = request('prov-nom');
            $mensaje = request('user-mensaje');
            $tipo = 1;
            $m->proveedor_rut = request('rut');
            $m->cia_minera_usuario_rut = auth()->guard('admin')->user()->rut;
            $m->proveedor_correo = $to;
            $m->minera_correo = $from;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from,$fromname,$sitio,$nombre,$tipo,$mensaje));

            return redirect()->back()->with('¡Correo Enviado!');
            //return view('contact')->with('success','¡Correo Enviado!');

        }else{

            $m = new MatchProveedores;
            $url = request('prov-url');
            $from =  auth()->user()->email;
            $fromname = auth()->user()->nombre;
            $sitio = auth()->user()->sitio_web;
            $mensaje = request('user-mensaje');
            $to = request('user-correo');
            $nombre = request('prov-nom');
            $tipo = 2;
            $m->proveedor_rut_emisor = auth()->user()->rut;
            $m->proveedor_rut_remitente = request('rut');
            $m->proveedor_correo_emisor = $from;
            $m->proveedor_correo_remitente = $to;
            $m->mensaje = $mensaje;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from,$fromname,$sitio,$nombre,$tipo,$mensaje));

            return redirect()->back()->withSuccess('¡Correo Enviado!');
            //return view('contact')->with('success','¡Correo Enviado!');
        }

 

    }


        public function sendminer(){


                $m = new MatchMinera;
                $url = request('prov-url');
                $from =  auth()->guard('admin')->user()->email;
                $fromname = auth()->guard('admin')->user()->nombre_usuario;
                $sitio = auth()->guard('admin')->user()->sitio_web;
                $mensaje = request('user-mensaje');
                $to = request('user-correo');
                $nombre = request('prov-nom');
                $tipo = 1;
                $m->minera_rut_emisor = auth()->guard('admin')->user()->rut;
                $m->minera_rut_remitente = request('rut');
                $m->minera_correo_emisor = $from;
                $m->minera_correo_remitente = $to;
                $m->save();



                Mail::to($to)->queue(new MessageReceived($from,$fromname,$sitio,$nombre,$tipo,$mensaje));

                return redirect()->back()->withSuccess('¡Correo Enviado!');
                //return view('contact')->with('success','¡Correo Enviado!');




    }


    public function contact(){

        $cont = new Soporte;
        

            $nombre  = request('name');
            $correo  = request('email');
            $mensaje = request('message');
            $rut     = request('rut');
            $from =  'soporte@espacioindustria.cl';


            $cont->rut = $rut;
            $cont->nombre = $nombre;
            $cont->correo = $correo;
            $cont->mensaje = $mensaje;

            $cont->save();



            Mail::to($from)->queue(new ContactMail($rut,$nombre,$correo,$mensaje));
    
    
            return redirect()->back()->withSuccess('¡Correo Enviado!');
            //return view('contact')->with('success','¡Correo Enviado!');

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


 
}
