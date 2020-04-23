<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Order;
use App\SlotBooking;
use App\OrderProducts;
use App\Address;
use App\Product;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 20; $i++){
            $totalWeight = 0;
            $randItemCount = rand(5,30);
            $total = 0;
            for($j = $randItemCount; $j > 0; $j--){
                $total = $total + Product::find($j)->price;
                OrderProducts::Create([
                    'orderID' => $i,
                    'productID' => $j,
                    'quantity' => rand(1,4),
                    'pricePaid' => Product::find($j)->price
                ]);
            }
            SlotBooking::create([
                'user_id' => $i,
                'slot_id' => rand(1,15),
                'date' => Carbon::now(),
                'post_code' => Address::where('user_id', $i)->first()->post_code,
                'status' => 2,
                'price' => 2.50
            ]);
            Order::create([
                'userID' =>  $i,
                'placedDate' => Carbon::now(),
                'slotBookingID' => $i,
                'note' => "Test Note",
                'totalWeight'=> $totalWeight,
                'itemCount' => $randItemCount,
                'delivery' => 2.50,
                'total' => $total + 2.50,
                'subtotal' => $total,
                'status'=> 1
            ]);
        }
    }
}
