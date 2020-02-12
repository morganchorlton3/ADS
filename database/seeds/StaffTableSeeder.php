<?php

use Illuminate\Database\Seeder;
use App\Staff;
use Faker\Provider\Base;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 34; $i++) {
            Staff::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'job_id' => $faker->numberBetween($min = 1, $max = 4),
            ]);
        }
    }
}
