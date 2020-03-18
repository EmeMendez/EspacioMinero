<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocupacion;
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Ocupacion::get();
        return view('guest.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = $request->validate([
            'user-rut' => 'required|max:11',
            'user-name' => 'required|max:15',
        ]);

        // if ($rules->fails()) {
        //     return redirect('personanatural/registrarse')
        //                 ->withErrors($rules)
        //                 ->withInput();
        // }

        $paso1 = false;
        $paso2 = false;
        $paso3 = false;

        $proveedor = DB::select('select * from proveedor where rut = ?', [request('user-rut')]);
        $ciaminerauser = DB::select('select * from cia_minera_usuario where rut = ?', [request('user-rut')]); 
        $invitado = DB::select('select * from users where rut = ?', [request('user-rut')]); 
        $proveedor2 = DB::select('select * from proveedor where email = ?', [request('user-email')]);
        $ciaminerauser2 = DB::select('select * from cia_minera_usuario where email = ?', [request('user-email')]); 
        $invitado2 = DB::select('select * from users where email = ?', [request('user-email')]); 
        $proveedor3 = DB::select('select * from proveedor where nombre = ?', [request('user-name')]);
        $ciaminerauser3 = DB::select('select * from cia_minera_usuario where nombre_usuario = ?', [request('user-name')]); 
        $invitado3 = DB::select('select * from users where nombre = ?', [request('user-name')]); 
        
        if(count($proveedor) == 0 and count($ciaminerauser) == 0 and count($invitado) == 0  ){
            $paso1 = true;
            
            //return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre')->with('error3','error de email');
        }
        
        if(count($proveedor2) == 0 and count($ciaminerauser2) == 0 and count($invitado2) == 0){
            $paso3 = true;
        }
        if(count($proveedor3) == 0 and count($ciaminerauser3) == 0 and count($invitado3) == 0){
            $paso2 = true;
        }
        
        if($paso1 == false or $paso2 == false or $paso3 == false){
            if(!$paso1){
                if(!$paso2){
                    if(!$paso3){
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre')->with('error3','error de email');
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error2','error de nombre');
                    }
                }
                else{
                    if(!$paso3){
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error3','error de nombre');
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
            }
            else{
                if(!$paso2){
                    if(!$paso3){
                        return back()->with('error2','¡Actualizacion Erronea! Algo ha salido mal')->withInput()->with('error3','¡Actualizacion Erronea! Algo ha salido mal');
                    }
                    else{
                        return back()->with('error2','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
                else{
                    if(!$paso3){
                        return back()->with('error3','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                    else{
                        return back()->with('error','¡Actualizacion Erronea! Algo ha salido mal')->withInput();
                    }
                }
            }

        }
        else{

        $guest = new User;

        $guest->rut                   = request('user-rut');
        $guest->nombre                = request('user-name');
        $guest->email                 = request('user-email');
        $guest->password              = bcrypt(request('user-pass'));
        $guest->telefono              = request('user-phone');
        $guest->id_ocupacion          = request('user-ocupacion');
        $guest->url                   = str_replace(" ","-",strtolower(request('user-name')));

        $guest->save();
        return redirect()->route('session')->with('success','¡Registro Existoso! Inicie Sesión para continuar');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
