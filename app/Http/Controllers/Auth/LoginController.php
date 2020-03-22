<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\CiaMineraUsuario;
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
    protected  $ciaminerauser = null;
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
        $ciaminerauser = null;
        $date = Carbon::now()->toDateTimeString();
    if (Auth::attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
        DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,3]);
        return redirect()->route('home');

    }else{
        if(Auth::guard('invitado')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,4]);
                return redirect()->route('home');
            }
            else{
                $ciaminerauser = DB::select('select * from cia_minera_usuario where rut = ? and password = ? and tipo = 0', [request('user-name'), md5(request('user-pass'))]);
                

                if(count($ciaminerauser)>0){
                    
                    DB::update('update cia_minera_usuario set password = ? , tipo = 1 where rut = ?', [Hash::make(request('user-pass')),request('user-name')]);

                    if(Auth::guard('admin')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                        DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                        return redirect()->route('home');
                    }
                    else{
                        return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
                    }    
                
            }
                else{
                
                    if(Auth::guard('admin')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                        DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
                        return redirect()->route('home');
                    }
                    else{

                    return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
                    }  
                }
                



        
        
        
              
    //         DB::insert('insert into log (id, fecha,id_tipo) values (?, ?,?)', [null,$date ,1]);
    //         return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
                    
        }
    } 
} 

    public function TipoUsuario(){
        $proveedor = auth()->user();
        $guest = auth()->guest();
        $ciaminera = auth()->guard('admin')->check();
        $invitado = auth()->guard('invitado')->check();
        return ['proveedor'=> $proveedor, 'guest'=>$guest,'ciaminera'=> $ciaminera,'invitado'=>$invitado];
        //return redirect()->route('home');
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('invitado')->logout();
        Auth::logout();
        return redirect()->route('home');

    }
    public function showLoginForm(){

        return redirect()->route('home');
    }
    


}

