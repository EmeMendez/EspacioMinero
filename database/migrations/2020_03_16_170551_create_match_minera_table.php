<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchMineraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_minera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('minera_rut_emisor');
            $table->string('minera_correo_emisor');
            $table->string('minera_rut_remitente');
            $table->string('minera_correo_remitente');
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
        Schema::dropIfExists('match_minera');
    }
}
