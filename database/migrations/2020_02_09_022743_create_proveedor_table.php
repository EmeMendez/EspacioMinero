<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->string('rut')->primary();
            $table->string('nombre');
            $table->string('sitio_web');
            $table->string('direccion');
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->foreign('tamanio_empresa_id')->references('id')->on('tamanio_empresa');
            $table->foreign('estado_id')->references('id')->on('estado');
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
        Schema::dropIfExists('proveedor');
    }
}
