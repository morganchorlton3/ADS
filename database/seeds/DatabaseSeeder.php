<?php

use App\Console\Commands\VanTrips;
use App\ProductLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AvailablePostcodesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(SlotTableSeeder::class);
        $this->call(VanTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        //$this->call(SlotBookingTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductLocationSeeder::class);
        $this->call(AvailablePostcodesTableSeeder::class);
        \Artisan::call('delivery:createVanTrips');
        //exec('php artisan delivery:createVanTrips');
       // $this->call(OrderTableSeeder::class);
    }
}
