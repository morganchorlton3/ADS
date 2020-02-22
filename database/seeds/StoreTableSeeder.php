<?php

use Illuminate\Database\Seeder;

use App\Store;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Depot 1',
            'post_code' => 'SK14 6QA',
        ]);
    }
}
