<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Match;
use App\MatchProveedores;
use App\Proveedor;
use App\CiaMineraUsuario;

class bannerController extends Controller
{
    public function index()
    {
        $imagenes = Banner::get();
        $estadistica = Match::count();
        $estadisticaMinera = MatchProveedores::count();
        $estadisticas = $estadistica + $estadisticaMinera;
        $proveedor = Proveedor::count();
        $CiaMineraUsuario = CiaMineraUsuario::count();

                           

        return view('home',['imagenes'=>$imagenes,'estadisticas'=>$estadisticas,'estadisticaMinera'=>$estadisticaMinera, 'proveedor'=>$proveedor,'CiaMineraUsuario'=>$CiaMineraUsuario]);   
   
    }
}
