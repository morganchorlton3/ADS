<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cart;
use Carbon\Carbon;
use App\Order;
use App\OrderProducts;
use App\SlotBooking;
use Mail;
use App\Mail\OrderCompleteMail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        $user = Auth::user();
        return view('shop.checkout.payment')->with([
            'parentCategories' => $parentCategories,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slot = SlotBooking::where('user_id', Auth::id())->where('status', 1)->first();
        $order = new Order();
        $order->userId = Auth::id();
        $order->placedDate = Carbon::now();
        $order->placedDate = $slot->date;
        $order->slotBookingId = $slot->id;
        $order->totalWeight = 22.2;
        $order->itemCount = Cart::count();
        $order->subTotal = Cart::total();
        $order->delivery = $slot->price;
        $order->total = Cart::total() + $slot->price;
        $order->status = 1;
        $cart = Cart::get();
        $order->save();
        $cart = Cart::get();
        foreach($cart as $item){
            $product = new OrderProducts();
            $product->orderID = $order->id;
            $product->productID = $item['id'];
            $product->quantity = $item['quantity'];
            $product->pricePaid = $item['price'];
            $product->save();
        }
        try{
            $charge = Stripe::charges()->create([
                'amount' => formatPrice(CartTotal()),
                'currency' => 'GBP',
                'description' => 'Advanced Delivery System Order',
                'receipt_email' => Auth::user()->email,
                'source' => $request->stripeToken,
                'metadata'=> [

                ],
              ]);

            //Clear Cart
            Cart::clearCart();
            addToDelivery($order->id);
            $slot->status = 2;
            $slot->save();
            $order = Order::with('orderProducts.product','user.address', 'SlotBooking.slot')->find($order->id);
            Mail::to(Auth::user()->email)->send(new OrderCompleteMail($order));
            return redirect()->route('checkout.success')->with([
                'success_toast'=> "Thankyou for your order!",
            ]);

        }catch(Exception $e){
            $order->status = 0;
            $order->save();
            return redirect()->route('checkout.success')->with([
                'error_toast'=> "Sorry Your payment hasnt gone through please try again",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRecpit($orderID){
        $items = OrderProducts::where('orderID', $orderID)->get();
    }
}
