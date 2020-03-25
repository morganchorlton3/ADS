<?php

use App\ProductLocation;
use Illuminate\Database\Seeder;

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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(SlotTableSeeder::class);
        $this->call(VanTableSeeder::class);
        $this->call(RandomOrdersTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        //$this->call(SlotBookingTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        //$this->call(ProductLocationSeeder::class);
    }
}
