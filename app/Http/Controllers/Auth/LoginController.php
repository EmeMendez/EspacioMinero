<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Http\Controllers\LogController ;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
        public function username()
    {
        return 'user-name';
    }


        public function login(){
        
            $date = Carbon::now()->toDateTimeString();
        if (Auth::attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
            
            DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,3]);
            return redirect()->route('home');

        }else{
            $primero = "0";
            $tiop = DB::select("SELECT `tipo` FROM `cia_minera_usuario` WHERE `rut` = '".request('user-name')."'", [1]);
            
            foreach ($tiop as $tp) {
                if(strval($tp->tipo) == '1'){
                    $primero = "1";
                }
            }

            if($primero == '0'){
                
                DB::update('update cia_minera_usuario set password = "'.Hash::make(request('user-pass')).'", tipo = 1 where rut = ?', [request('user-name')]);
                if(Auth::guard('admin')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                    DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                    return redirect()->route('home');
                }
                else{
                    DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                    return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
                }
            }
            else{
                
                if(Auth::guard('admin')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                    DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                    return redirect()->route('home');
                }
                else{
                    DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                    return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
                }
            }
            
            
                
               
        
    }
    }

    public function TipoUsuario(){
        $proveedor = auth()->user();
        $invitado = auth()->guest();
        $ciaminera = auth()->guard('admin')->check();
        return ['proveedor'=> $proveedor, 'invitado'=>$invitado,'ciaminera'=> $ciaminera];
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::logout();
        return redirect()->route('home');

    }
    



}

