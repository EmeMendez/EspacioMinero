<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registroMineraController extends Controller
{
    //

    public function index()
    {
        return view('proveedor.index',compact('proveedor'));
    }

    public function store(){
        $rut = request('user-rut');
        //$nombre = request
    }
}
