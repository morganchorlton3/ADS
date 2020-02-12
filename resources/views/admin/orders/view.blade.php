@extends('layouts.dashboard')

@section('title', 'View Order')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'View Order')

@section('content')
<div class="row h-300 mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Customer Details
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label>Name: </label>
                        <h3>{{ $order->user->first_name . ' ' . $order->user->last_name  }}</h3>
                    </div>
                    <div class="col-lg-6">
                        <label>Contact Number: </label>
                        <h3>{{ $order->user->phone_number  }}</h3>
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
</div>
<div class="row h-300">
    <div class="col-lg-12">
        <div class="card">
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
                        <label>Order Total: </label>
                        <h3>{{ formatPrice($order->total)  }}</h3>
                    </div>
                    <div class="col-lg-3">
                        <label>Delivery Slot: </label>
                        <h3>{{ Carbon\Carbon::Parse($order->slot->start)->format('H:i') }} - {{ Carbon\Carbon::Parse($order->slot->end)->format('H:i') }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Address: </label>
                        <h3>{{ $order->address->address_line_1 }}, 
                                    @if(!$order->address->address_line_2 == "")
                                        {{ $order->address->address_line_2 }}, 
                                    @endif
                                    @if(!$order->address->address_line_3 == "")
                                        {{ $order->address->address_line_3 }}, 
                                    @endif
                                    {{ $order->address->post_code }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection