<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionIdToCiudadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ciudad', function (Blueprint $table) {
            Schema::table('ciudad', function (Blueprint $table) {
                $table->unsignedBigInteger('region_id')->after('nombre')->nulleable();
            });
            Schema::table('ciudad', function($table) {
                $table->foreign('region_id')->references('id')->on('region');
        
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ciudad', function (Blueprint $table) {
            //
        });
    }
}
