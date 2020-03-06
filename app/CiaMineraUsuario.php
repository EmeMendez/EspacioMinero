<?php

namespace App;
use Illuminate\Foundation\Auth\Admin as Authenticatable;

class CiaMineraUsuario extends Authenticatable
{
    
    protected $table = 'cia_minera_usuario';
    protected $keyType = 'string';
    protected $primaryKey = 'rut';
    protected $fillable = [
    'rut', 'password'
];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
