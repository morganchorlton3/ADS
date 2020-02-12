<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'user_id' => '1',
            'post_code' => 'OL6 6HW',
            'address_line_1' => '5 Lennox House',
            'address_line_2' => '40 Henrietta Street',
            'address_line_3' => ' ',
            'city' => 'Ashton-Under-Lyne',
        ]);

        $faker = Faker\Factory::create('en_GB');

        $counter = 2;
        for($i = 0; $i < 100; $i++) {
            Address::create([
                'user_id' => $counter,
                'post_code' => $faker->postcode,
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->streetAddress,
                'city' => $faker->city,
            ]);
            $counter++;
        }
    }
}
