<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
        
        if (Auth::attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
            return redirect()->route('home');
        }else{
            if(Auth::guard('admin')->attempt(['rut'=> request('user-name') , 'password' => request('user-pass') ] )){
                return redirect()->route('home');
                //return redirect()->intended(route('admin.session'))->with('status','You are Logged in as Admin!');
            }
            else{
            return redirect()->route('session')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
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

