<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('proveedor_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('proveedor_rut');
            $table->unsignedBigInteger('tag_id')->unsigned();
        });
        Schema::table('proveedor_tag', function($table) {
            $table->foreign('proveedor_rut')->references('rut')->on('proveedor');
            $table->foreign('tag_id')->references('id')->on('tag');
        });  
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor_tag');
    }
}
