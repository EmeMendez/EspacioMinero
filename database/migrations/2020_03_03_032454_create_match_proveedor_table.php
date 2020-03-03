<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_proveedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proveedor_rut_emisor');
            $table->string('proveedor_correo_emisor');
            $table->string('proveedor_rut_remitente');
            $table->string('proveedor_correo_remitente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_proveedor');
    }
}
