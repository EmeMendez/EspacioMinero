<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CiaMineraUsuarioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}