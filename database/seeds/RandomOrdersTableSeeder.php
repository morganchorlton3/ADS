<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\OrderProducts;
use Carbon\Carbon;

class RandomOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $counter = $faker->numberBetween($min = 1, $max = 101);
        while($counter > 0){
            Order::create([
                'user_id' => $counter, 
                'slot_id' => $faker->numberBetween($min = 1, $max = 3), 
                'placed_date' => Carbon::now()->subDays(1),
                'delivery_date' => Carbon::now(),
                'address_id' => 1,
                'note' => "This is a test note",
                'total_weight' => 22.5,
                'item_count' => 5,
                'total' => 12.97,
                'status' => $faker->numberBetween($min = 1, $max = 3)
            ]);
            for($i = 0; $i < 5; $i++) {
                OrderProducts::create([
                    'order_id' => $counter,
                    'product_id' => $faker->numberBetween($min = 1, $max = 5),
                    'product_name' => "Tuna Chunks",
                    'product_quantity' => 2,
                    'product_price' => 3.99,
                    'product_barcode' => "5057967621057",
                ]);
            }
            $counter--;
        }       

    }
}
