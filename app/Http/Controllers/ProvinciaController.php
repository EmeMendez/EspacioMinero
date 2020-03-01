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
}
