<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRangoMaximoToTamanioEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tamanio_empresa', function (Blueprint $table) {
            $table->string('ventaMaxima')->after('nombre')->nulleable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tamanio_empresa', function (Blueprint $table) {
            $table->dropColumn('ventaMinima');
        });
    }
}
