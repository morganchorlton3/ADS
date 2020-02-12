@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Categories')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Orders</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Price</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th>{{ $order->id }}</th>
                            <th>{{ formatPrice($order->total) }}</th>
                            <td>
                                {{ $order->address->address_line_1 }},</br>
                                @if(!$order->address->address_line_2 == "")
                                    {{ $order->address->address_line_2 }},</br>
                                @endif
                                @if(!$order->address->address_line_3 == "")
                                    {{ $order->address->address_line_3 }},</br>
                                @endif
                                {{ $order->address->post_code }}
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection