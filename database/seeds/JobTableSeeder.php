<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => "Customer Delivery Driver",
            'pay_rate' => 9.68
        ]);

        Job::create([
            'title' => "Personal Shopper",
            'pay_rate' => 8.50
        ]);

        Job::create([
            'title' => "Driver Manager",
            'pay_rate' => 12.90
        ]);

        Job::create([
            'title' => "Personal Shopper Manager",
            'pay_rate' => 12.90
        ]);
    }
}
