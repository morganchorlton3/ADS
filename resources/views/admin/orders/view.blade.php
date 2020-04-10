@extends('layouts.dashboard')

@section('title', 'View Order')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'View Order')

@section('content')
<div class="row mb-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                Customer Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label>Name: </label>
                        <h3>{{ $order->User->first_name . ' ' . $order->User->last_name  }}</h3>
                    </div>
                    <div class="col-lg-6">
                        <label>Contact Number: </label>
                        <h3>{{ $order->User->phone_number  }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Address: </label>
                        <h3>{{ $order->address->address_line_1 }},</br>
                                    @if(!$order->address->address_line_2 == "")
                                        {{ $order->address->address_line_2 }},</br>
                                    @endif
                                    @if(!$order->address->address_line_3 == "")
                                        {{ $order->address->address_line_3 }},</br>
                                    @endif
                                    {{ $order->address->post_code }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header">
                Order Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label>Order Number: </label>
                        <h3>{{ $order->id }}</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Order Status: </label>
                        <h3>{{ presentStatus($order->status)  }}</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Item Count: </label>
                        <h3>{{ $order->itemCount  }}</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Order Total: </label>
                        <h3>{{ formatPrice($order->total)  }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label>Delivery Slot: </label>
                        <h3>{{ Carbon\Carbon::Parse($slot->start)->format('H:i') }} - {{ Carbon\Carbon::Parse($slot->end)->format('H:i') }}</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Van Run: </label>
                        <h3>1A</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Delivery Date: </label>
                        <h3>{{ Carbon\Carbon::parse($order->SlotBooking->date)->format('l jS') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection