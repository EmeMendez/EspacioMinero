<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTelefonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_telefono', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('telefono');
            $table->string('proveedor_rut')->unique();
            $table->timestamps();
        });
        Schema::table('proveedor_telefono', function($table) {
            $table->foreign('proveedor_rut')->references('rut')->on('proveedor');
            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor_telefono');
    }
}
