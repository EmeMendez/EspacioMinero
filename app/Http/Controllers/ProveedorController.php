<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        if(request()->ajax()){
            return $proveedor;
        }
        return view('proveedor.index',compact('proveedor'));
    }

    public function getProveedoresByName($parameter)
    {

        $proveedor = Proveedor::where('nombre','LIKE', '%' . $parameter . '%')->get();
        if(request()->ajax()){
            return $proveedor;
        }
        return view('proveedor.index',compact('proveedor'));
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
    public function store()
    {

        $p = new Proveedor;


        $p->rut = request('user-rut');
        $p->nombre = request('user-name');
        $p->sitio_web = request('user-sitio');
        $p->direccion = request('user-address');
        $p->password = request('user-pass');
        $p->categoria_id = request('user-cat');
        $p->ciudad_id = request('user-city');
        $p->tamanio_empresa_id = request('user-tamanio');
        $p->estado_id = request('user-status');
    
        $p->save();
        return redirect()->route('proveedor.index');



    }

    /**
     * Se muestra un recurso especifico por ejemplo por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
