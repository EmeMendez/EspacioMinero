<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use App\Mail\PasswordReset;
use Auth;
use App\Match;
use App\MatchProveedores;
use App\PasswordReset;

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
        
            $from =  auth()->guard('admin')->user()->correo;
            $to = request('correo');
            $m->proveedor_rut = request('rut');
            $m->cia_minera_usuario_rut = auth()->guard('admin')->user()->rut;
            $m->proveedor_correo = $to;
            $m->minera_correo = $from;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from));


            return new MessageReceived($from);
        }else{

            $m = new MatchProveedores;
        
            $from =  auth()->user()->correo;
            $to = request('correo');
            $m->proveedor_rut_emisor = auth()->user()->rut;
            $m->proveedor_rut_remitente = request('rut');
            $m->proveedor_correo_emisor = $from;
            $m->proveedor_correo_remitente = $to;
            $m->save();



            Mail::to($to)->queue(new MessageReceived($from));


            return new MessageReceived($from);
        }

 

    }

    public function resetPassword(){
        $to = request('email');
        

        Mail::to($to)->queue(new PasswordReset($to));
        return new PasswordReset($to);
    }


 
}
