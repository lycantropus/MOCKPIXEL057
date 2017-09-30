<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_id');
            $table->float('latitude', 8, 6);
            $table->float('longitude', 8, 6);
            $table->string('location_address')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geo_logs', function(Blueprint $table){
            $table->dropForeign(['vehicle_id']);
        });

        Schema::dropIfExists('geo_logs');
    }
}
