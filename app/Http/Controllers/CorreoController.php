<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Auth;

class CorreoController extends Controller
{
    public function send(){

        $from =  auth()->guard('admin')->user()->correo;
        $to = request('correo');

        Mail::to($to)->queue(new MessageReceived($from));
        return new MessageReceived($from);

    }
}
