<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use \Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPassword;

class User extends Authenticatable implements CanResetPasswordContract
{
    
    use  Notifiable;
    use CanResetPassword;
    protected $table = 'proveedor';
    protected $keyType = 'string';
    protected $primaryKey = 'url';
    protected $fillable = [
    'rut', 'password','email'
];
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getRouteKeyName(){
        return 'url';
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

}
