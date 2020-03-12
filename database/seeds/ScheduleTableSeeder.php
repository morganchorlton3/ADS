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
        $counter = 1;
        while($counter <= 7){
            DeliverySchedule::create(['run' => 1, 'day' => $counter,'start' => '08:00:00','end' => '11:00:00']);
            DeliverySchedule::create(['run' => 2,'day' => $counter,'start' => '13:00:00','end' => '17:00:00']);
            DeliverySchedule::create(['run' => 3,'day' => $counter,'start' => '18:00:00','end' => '23:00:00']);
            $counter++;
        }
    }
}
