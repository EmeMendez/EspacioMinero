<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorCertificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_certificacion', function (Blueprint $table) {
            $table->string('proveedor_rut')->unique();
            $table->unsignedBigInteger('certificacion_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('proveedor_certificacion', function($table) {
            $table->foreign('proveedor_rut')->references('rut')->on('proveedor');
            $table->foreign('certificacion_id')->references('id')->on('certificacion');
        }); 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor_certificacion');
    }
}
