@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Categories')

@section('content')
<div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders For Today ({{ Carbon\Carbon::now()->format('D/M/Y') }})</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                {{--<th scope="col">Delivery Slot</th>--}}
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th>{{ $order->id }}</th>
                                <th>{{ $order->user->first_name . ' ' . $order->user->last_name }}</th>
                                {{--<th>{{ Carbon\Carbon::Parse($order->slot->start)->format('H:i') }} - {{ Carbon\Carbon::Parse($order->slot->end)->format('H:i') }}</th>--}}
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
                                <td>{{ presentStatus($order->status) }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="pr-2 pl-2">
                                        <button type="button" class="btn btn-sm btn-primary">View Order</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 mt-4 mb-4">
                            <div class="d-flex justify-content-center">
                                {{ $orders->links() }} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection