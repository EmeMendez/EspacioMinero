<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Proveedor extends Model implements AuthenticatableContract {

    use Authenticatable;
    protected $table = 'proveedor';
    protected $keyType = 'string';
    protected $primaryKey = 'url';
    protected $fillable = [
    'rut', 'password'
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


}
