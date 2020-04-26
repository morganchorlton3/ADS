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
            $table->integer('deliverySchedule');
            $table->date('deliveryDate');
            $table->string('lastPostCode');
            $table->time('runTime');
<<<<<<< HEAD
=======
            $table->time('runEnd');
            $table->softDeletes();
>>>>>>> 364136cf80041101472505b69da979fe8945ff48
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
