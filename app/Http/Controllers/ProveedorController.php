<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Proveedor;
use App\Ciudad;
use App\TamanioEmpresa;
use App\Categoria;
class ProveedorController extends Controller
{
    
    /**
     * Sirve para listar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::get();
        return view('proveedor.index',compact('proveedor'));
    }

    public function indexJSON()
    {

        $proveedor = Proveedor::get();
         return $proveedor;
        
    }

    public function getProveedoresByName($parameter)
    {

        $proveedor = Proveedor::where('nombre','LIKE', '%' . $parameter . '%')->get();
        return $proveedor;
        
    }
    /**
     * Mostrar el formulario para crear un nuevo proveedor 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudad = Ciudad::get();
        $tamanioempresa = TamanioEmpresa::get();
        $categoria = Categoria::get();
        return view('proveedor.create',compact('ciudad','tamanioempresa','categoria'));

    }

    /**
     * Para guardar el recurso desde el create(como un insert)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //$r->file('user-imagen')->store('public');
        $p = new Proveedor;

        if($r->hasFile('user-imagen')){
            $p->imagen = $r->file('user-imagen')->store('public');
        }
        

        $p->rut                = request('user-rut');
        $p->nombre             = request('user-name');
        $p->sitio_web          = request('user-sitio');
        $p->descripcion        = request('user-descripcion');
        $p->direccion          = request('user-address');
        $p->password           = bcrypt(request('user-pass'));
        $p->categoria_id       = request('user-cat');
        $p->ciudad_id          = request('user-city');
        $p->tamanio_empresa_id = request('user-tamanio');
        $p->estado_id          = request('user-status');
        $p->url                = str_replace(" ","-",strtolower(request('user-name')));

        $p->save();
        return redirect()->route('session')->with('success','¡Registro Existoso! Inicie Sesión para continuar');



    }

    /**
     * Se muestra un recurso especifico por ejemplo por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rut)
    {
         $p = Proveedor::find($rut);
         return view('proveedor.show',compact('p'));
               
    }

    /**
     * Mostrar el formulario para editar un proveedor
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Edita un proveedor desde el metodo edit es decir este es el update propiamente tal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Elimina un recurso especifico por identificador (proveedor)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
