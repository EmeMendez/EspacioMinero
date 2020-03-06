<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class bannerController extends Controller
{
    public function index()
    {
        $imagenes = Banner::get();
        return view('home',compact('imagenes'));
    }
}
