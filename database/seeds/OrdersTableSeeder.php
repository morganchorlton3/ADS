<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\OrderProducts;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counter = 0;
        while($counter < 10){
            Order::create([
                'user_id' => 1, 
                'slot_id' => 1, 
                'address_id' => 1,
                'note' => "This is a test note",
                'total_weight' => 22.5,
                'item_count' => 5,
                'total' => 12.97,
                'status' => 1
            ]);
    
            OrderProducts::create([
                'order_id' => $counter,
                'product_id' => 2,
                'product_name' => "Tuna Chunks",
                'product_quantity' => 2,
                'product_price' => 3.99,
                'product_barcode' => "5057967621057",
            ]);
    
            OrderProducts::create([
                'order_id' => $counter,
                'product_id' => 3,
                'product_name' => "Tinned Tomatoes",
                'product_quantity' => 3,
                'product_price' => 2.99,
                'product_barcode' => "8001440000010",
            ]);
            $counter++;
        }       

    }
}
