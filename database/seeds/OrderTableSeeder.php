<?php

use App\Order;
use App\User;
use App\SlotBooking;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i < User::count(); $i++){
            $user = User::find($i);
            $order = new Order();
            $order->userID = $user->id;
            $order->PlacedDate = Carbon\Carbon::now()->addDays(1);
            $order->SlotBookingID = SlotBooking::where('user_id', $user->id)->first()->id;
            $order->totalWeight = 22;
            $order->itemCount = 5;
            $order->total = 5.5;
            $order->status = 1;
            $order->save();
        }
    }
}
