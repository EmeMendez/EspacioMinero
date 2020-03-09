<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use App\Mail\ContactMail;
use Auth;
use App\Match;
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
        
            $from =  auth()->guard('admin')->user()->email;
            $fromname = auth()->guard('admin')->user()->nombre_usuario;
            $sitio = auth()->guard('admin')->user()->sitio_web;
            $to = request('correo');
            $m->proveedor_rut = request('rut');
            $m->cia_minera_usuario_rut = auth()->guard('admin')->user()->rut;
            $m->proveedor_correo = $to;
            $m->minera_correo = $from;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from,$fromname,$sitio,request('prov-nom')));

            return redirect()->back()->withSuccess('¡Correo Enviado!');
            //return view('contact')->with('success','¡Correo Enviado!');

        }else{

            $m = new MatchProveedores;
        
            $from =  auth()->user()->email;
            $to = request('correo');
            $m->proveedor_rut_emisor = auth()->user()->rut;
            $m->proveedor_rut_remitente = request('rut');
            $m->proveedor_correo_emisor = $from;
            $m->proveedor_correo_remitente = $to;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from));

            return redirect()->back()->withSuccess('¡Correo Enviado!');
            //return view('contact')->with('success','¡Correo Enviado!');

        }

 

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


 
}
