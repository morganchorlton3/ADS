<?php

use Illuminate\Database\Seeder;
use App\Address;
use App\User;
use Illuminate\Support\Arr;

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

        Address::create([
            'user_id' => '2',
            'post_code' => 'sk153rj',
            'address_line_1' => '79 crowswood drive',
            'address_line_2' => 'stalybridge',
            'address_line_3' => ' ',
            'city' => 'stalybridge',
        ]);

        $faker = Faker\Factory::create('en_GB');

        $counter = 2;

        global $available;

        $available = DB::table('available_postcodes')->pluck('postCode')->toArray();

        //echo $postCodeList[2];    

        for($i = 0; $i < 100; $i++) {
            $randPostCode = Arr::random(DB::table('available_postcodes')->pluck('postCode')->toArray());
            Address::create([
                'user_id' => $counter,
                'post_code' =>  $randPostCode,
                'address_line_1' => $faker->streetAddress,
                'city' => $faker->city,
            ]);
            //Remove PostCode
            unset($available, $randPostCode);
            //Increment Counter
            $counter++;
        }
    }
}
