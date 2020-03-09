<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProveedorTag;

class ProveedorTagController extends Controller
{
    public function getProveedorTags($proveedor_rut){
        $proveedor_tags = ProveedorTag::join("tag","tag.id","=","proveedor_tag.tag_id")
                                        ->select('tag.nombre as nombre')
                                        ->where('proveedor_rut', $proveedor_rut)->get();
        return $proveedor_tags;
    } 
}
