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
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table->unsignedBigInteger('ciudad_id')->unsigned();
            $table->unsignedBigInteger('tamanio_empresa_id')->unsigned();
            $table->unsignedBigInteger('estado_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('proveedor', function($table) {
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->foreign('tamanio_empresa_id')->references('id')->on('tamanio_empresa');
            $table->foreign('estado_id')->references('id')->on('estado');
      
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
