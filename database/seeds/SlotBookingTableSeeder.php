<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\SlotBooking;
use App\Slot;

class SlotBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $slotCount = Slot::count() * 7; 

        while($slotCount > 0){
            if(rand(0,1) == 0){
                SlotBooking::create([
                    'user_id' => rand(0,100),
                    'slot_id' => $faker->numberBetween($min = 1, $max = 15),
                    'date' => $faker->randomElement([carbon::now()->add(1, 'day'), carbon::now()->add(2, 'day'), carbon::now()->add(3, 'day'), carbon::now()->add(4, 'day')]),
                    'post_code' => $faker->randomElement(['OL6 6HW', 'sk15 3rj', 'sk13 6th']),
                    'status' => 1,
                    'expiration' => carbon::now()->add(1, 'day'),
                ]);
            }
            $slotCount--;
        }
    }
}
