<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function provinciasByRegion($region){
        $provincias = Provincia::where('region_id', $region)->get();
        return ['provincias'  => $provincias];
    }
    
    public function index(){
        $provincias = Provincia::get();
        return $provincias;
    }

    public function getProvinciasByRegion($region_id){
        $provincia = Provincia::where('region_id', $region_id)->get();
        return $provincia;
    }
}
