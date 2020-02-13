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

        $faker = Faker\Factory::create();


        $counter = 0;
        while($counter < $faker->numberBetween($min = 50, $max = 101)){
            SlotBooking::create([
                'user_id' => $counter,
                'slot_id' => $faker->numberBetween($min = 1, $max = 15),
                'date' => $faker->randomElement([carbon::now()->add(1, 'day'), carbon::now()->add(2, 'day'), carbon::now()->add(3, 'day'), carbon::now()->add(4, 'day')]),
                'post_code' => $faker->randomElement(['ol66hw', 'sk153rj', 'sk15 6th', 'sk13 6hx']),
            ]);
            $counter++;
        }
    }
}
