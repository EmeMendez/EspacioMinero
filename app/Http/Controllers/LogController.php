<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log as Log;

class LogController extends Controller
{

    public static function registrar()
    {
        
        $log = new Log;
        $log->fecha = getdate();
        $log->id_tipo = 2;
        $log->save();
        
    
    }
}
