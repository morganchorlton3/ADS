@component('mail::message')
<h1 style="text-align: center;">Thank you for shopping at {{ config('app.name') }}</h1>

<p>Your order is being proccess and will be delivered on the <span style="font-weight: 900;">{{ Carbon\Carbon::parse($order->slotBooking->date)->format('jS M Y') }}</span> Between 
    <span style="font-weight: 900;">{{ Carbon\Carbon::parse($order->SlotBooking->slot->start)->format('H:i') }} - {{ Carbon\Carbon::parse($order->SlotBooking->slot->end)->format('H:i') }}</span>.</p>


@component('mail::table')
| Item               | Price   | Qty | TotalPrice|
| ------------------ |:-------:| :--:| :--------:|
@foreach($order->orderProducts as $product)
|{{$product->product->name}}| {{ formatPrice($product->pricePaid) }}   |  {{ $product->quantity}}  |   {{ formatPrice($product->pricePaid * $product->quantity)}}   |
@endforeach
| | | Sub Total: | {{ formatPrice($order->subTotal)}} |
| | | Delivery: | {{ formatPrice($order->delivery)}} |
| | | Total: | {{formatPrice($order->total) }} |
@endcomponent

@component('mail::button', ['url' => route('account.orders.download', $order->id)])
Download your recipt
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
