<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->string('proveedor_rut')->unique();
            $table->string('cia_minera_usuario_rut')->unique();
            $table->unsignedBigInteger('estado_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('match', function($table) {
            $table->foreign('proveedor_rut')->references('rut')->on('proveedor');
            $table->foreign('cia_minera_usuario_rut')->references('rut')->on('cia_minera_usuario');
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
        Schema::dropIfExists('match');
    }
}
