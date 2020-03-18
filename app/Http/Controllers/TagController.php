<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\ProveedorTag;
class TagController extends Controller
{
      /**
     * return all tags.
     *
     */   
    public function index(){
        $proveedor_tags = ProveedorTag::where("proveedor_rut", "=", auth()->user()->rut  )->get();                              
        $tags = Tag::get();       
        foreach($tags as $key => $t){
                foreach($proveedor_tags as $pt){
                     if($pt->tag_id == $t->id){
                        unset($tags[$key]);
                     }                       
                }                             
        }
        return $tags;
    }
    /**
     * return just 10 first tags by name.
     *
     * @return \Illuminate\Http\Response
     */   
    public function getTags($tag_name){
        $tags = Tag::where('tag.nombre','LIKE', $tag_name . '%')->take(10)->get();
        return $tags;
    }
    /**
     * return just 10 first tags by name.
     *
     */   
    public function store(Request $request){

        $tag = Tag::where('nombre',$request->nombre)->first();
        if(!$tag){
            $tag = new Tag;
            $tag->nombre = $request->nombre;
            $tag->timestamps = false;
            $tag->save();


            $proveedor_tag = new ProveedorTag;
            $proveedor_tag->tag_id = $tag->id;
            $proveedor_tag->proveedor_rut = auth()->user()->rut;
            $proveedor_tag->timestamps = false;
            $proveedor_tag->save();
           
        }else{
            $proveedor_tag =ProveedorTag::join('tag','tag.id','=','proveedor_tag.tag_id')
                                        ->where('tag.nombre','=',$request->nombre)->first();
            if(!$proveedor_tag){
                $proveedor_tag = new ProveedorTag;
                $proveedor_tag->tag_id = $tag->id;
                $proveedor_tag->proveedor_rut = auth()->user()->rut;
                $proveedor_tag->timestamps = false;
                $proveedor_tag->save();  
            } else{
                return 'false';
            }         
        }

        return $proveedor_tag;
    }

    public function getTagsTodos(){
        $tags = Tag::get();
        return $tags;
    }

      /**
     * chck if tag exist
     * return a boolean .
     */  
    public function exist($tag_name){
        if(Tag::where('nombre',$tag_name)->first()){
            return true;
        }else{
            return false;
        }
    }
}
