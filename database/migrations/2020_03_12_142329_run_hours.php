<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RunHours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('slot');
            $table->date('deliveryDate');
            $table->integer('deliveryCount');
            $table->string('lastPostCode')->nullable();
            $table->time('currentRunTime')->nullable();
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
        Schema::dropIfExists('run_hours');
    }
}
