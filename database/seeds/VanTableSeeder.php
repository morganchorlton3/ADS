<?php

use Illuminate\Database\Seeder;
use App\DeliveryVehicle;

class VanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryVehicle::create(['registration' => 'AB12 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        DeliveryVehicle::create(['registration' => 'AB13 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        DeliveryVehicle::create(['registration' => 'AB14 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        //DeliveryVehicle::create(['registration' => 'AB15 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        //DeliveryVehicle::create(['registration' => 'AB16 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        //DeliveryVehicle::create(['registration' => 'AB17 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        //DeliveryVehicle::create(['registration' => 'AB18 ABC', 'mileage' => '12234', 'capacity' => '3500']);
        //DeliveryVehicle::create(['registration' => 'AB19 ABC', 'mileage' => '12234', 'capacity' => '3500']);
    }
}
