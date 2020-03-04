<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorCertificacion extends Model
{
    protected $table = 'proveedor_certificacion';
    protected $keyType = 'string';
    protected $primaryKey = 'proveedor_rut';
}
