<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProveedorTag;

class ProveedorTagController extends Controller
{
    public function getProveedorTags($proveedor_rut){
        $proveedor_tags = ProveedorTag::join("tag","tag.id","=","proveedor_tag.tag_id")
                                        ->select('tag.nombre as nombre','tag_id')
                                        ->where('proveedor_rut', $proveedor_rut)->get();
        return $proveedor_tags;
    }
    
    public function show(){
        $rut = auth()->user()->rut;
        $proveedor_tags = ProveedorTag::join("tag","tag.id","=","proveedor_tag.tag_id")
                                        ->select('tag.nombre as nombre','tag_id','proveedor_tag.id as id')
                                        ->where('proveedor_rut', $rut)->get();
        return ['tags' => $proveedor_tags, 'proveedor_rut' => $rut];
    }
    
    public function store(Request $request)
    {
        $proveedor_tag = new ProveedorTag;
        $proveedor_tag->proveedor_rut = $request->proveedor_rut;
        $proveedor_tag->tag_id = $request->tag_id;
        $proveedor_tag->timestamps = false;
        $proveedor_tag->save();
        return $request;
       
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProveedorTag::where("id","=",$request->id)
                                ->delete();
        return $request;
        
    }
}
