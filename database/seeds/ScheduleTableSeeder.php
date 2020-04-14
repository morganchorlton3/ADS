<?php

use Illuminate\Database\Seeder;
use App\DeliverySchedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliverySchedule::create(['run' => 1, 'start' => '08:00:00','end' => '12:00:00']);
        DeliverySchedule::create(['run' => 2,'start' => '13:00:00','end' => '17:00:00']);
        DeliverySchedule::create(['run' => 3,'start' => '18:00:00','end' => '23:00:00']);

    }
}
