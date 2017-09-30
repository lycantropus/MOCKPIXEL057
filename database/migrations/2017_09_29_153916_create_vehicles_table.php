<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vin');
            $table->string('active_geofence')->nullable()->default(null);
            $table->unsignedInteger('vehicle_type_id')->nullable()->default(1);
            $table->timestamp('engine_off_at')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function(Blueprint $table){

            $table->dropForeign(['vehicle_type_id']);
        });

        Schema::dropIfExists('vehicles');
    }
}
