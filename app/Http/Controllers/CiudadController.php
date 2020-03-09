<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function CiudadesByProvincia($provincia){
       $ciudades = Ciudad::where('provincia_id', $provincia)->get();
       return ['ciudades'  => $ciudades];
   }
   
   public function getciudadesByProvincia($provincia_id){
      $ciudades = Ciudad::where('provincia_id',$provincia_id)->get();
      return $ciudades;
   }
}
