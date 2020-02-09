<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiaMineraUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cia_minera_usuario', function (Blueprint $table) {
            $table->string('rut')->primary();
            $table->string('nombre_usuario');
            $table->string('telefono');
            $table->string('correo');
            $table->foreign('cia_minera_id')->references('id')->on('cia_minera');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('usuario_tipo')->references('id')->on('usuario_tipo');

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
        Schema::dropIfExists('cia_minera_usuario');
    }
}
