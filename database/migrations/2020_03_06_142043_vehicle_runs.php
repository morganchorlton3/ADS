<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VehicleRuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_runs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('run');
            $table->string('vanAssignment')->nullable();
            $table->date('deliveryDate');
            $table->integer('group');
            $table->string('last_postcode');
            $table->time('run_time');
            $table->integer('slotID');
            $table->softDeletes();
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
        Schema::dropIfExists('vehicle_runs');
    }
}
