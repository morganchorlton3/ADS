<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\SlotBooking;
use App\Slot;
use App\User;
use App\Address;

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

        $counter =1; 

        while($counter < 100){
                SlotBooking::create([
                    'user_id' => rand(0,100),
                    'slot_id' => $faker->numberBetween($min = 1, $max = 15),
                    'date' => $faker->randomElement([carbon::now()->add(1, 'day'), carbon::now()->add(2, 'day'), carbon::now()->add(3, 'day'), carbon::now()->add(4, 'day')]),
                    'post_code' => Address::where('user_id', $counter)->value('post_code'),
                    'status' => 1,
                    'expiration' => carbon::now()->add(1, 'day'),
                ]);
                $counter++;
        }
    }
}
