<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $keyType = 'string';
    protected $primaryKey = 'url';


    public function getRouteKeyName(){
        return 'url';
    }
}
