<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPassword;

class Proveedor extends Model implements AuthenticatableContract ,CanResetPasswordContract {

    use Authenticatable;
    use  Notifiable;
    use CanResetPassword;
    protected $table = 'proveedor';
    protected $keyType = 'string';
    protected $primaryKey = 'rut';
    protected $fillable = [
    'rut', 'password','email'
];


    public function getRouteKeyName(){
        return 'url';
    }

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

    public function scopeCategoria($query,$categoria)
    {
        if(!empty($categoria))
            return $query->where('categoria.nombre','=',$categoria);
    }

    public function scopeTamanio($query,$tamanio_empresa)
    {
        if(!empty($tamanio_empresa))
            return $query->where('tamanio_empresa.nombre','=',$tamanio_empresa);
    }

    public function scopeTag($query,$tag)
    {
        if(!empty($tag))
            return $query->whereIn('tag.nombre',$tag);
    }
 
         
}