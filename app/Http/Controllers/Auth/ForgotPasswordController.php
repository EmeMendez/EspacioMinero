<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    protected $redirectTo = '/';
    use SendsPasswordResetEmails;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     * 
     * @return void
     */
     public function __construct()
    {
        if (Auth::attempt(['email'=> request('email')] )){
            $this->middleware('auth');
        }else{
            if(Auth::guard('admin')->attempt(['email'=> request('email')] )){
                $this->middleware('guest:admin');
                //return redirect()->intended(route('admin.session'))->with('status','You are Logged in as Admin!');
            }
            else{
            return redirect()->route('password.request')->with('error','¡Rut y/o contraseña incorrecta. Vuelva a intentarlo!');;
        }
    }
        
    }

    /**
     * Show the reset email form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm(){
        return view('auth.passwords.email',[
            'title' => 'Admin Password Reset',
            'passwordEmailRoute' => 'admin.password.email'
        ]);
    }

    /**
     * password broker for admin guard.
     * 
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker(){
        return Password::broker('admins');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(){
        return Auth::guard('admin');
    }
}
