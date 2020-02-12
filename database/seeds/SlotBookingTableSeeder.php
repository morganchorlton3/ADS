<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\SlotBooking;

class SlotBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 0;
        while($counter < 10){
            SlotBooking::create([
                'user_id' => $counter,
                'slot_id' => 1,
                'date' => carbon::now()->add(1, 'day'),
                'post_code' => 'ol66hw'
            ]);
            $counter++;
        }
    }
}
