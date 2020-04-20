@extends('layouts.app-no-cart')

@section('style')

@endsection

@section('content')
<div class="col-lg-12">
    <div class="card d-flex justify-content-center">
        <div class="card-body d-flex flex-column text-center">
            <h3 class="mb-4">Orders</h3>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placed Date</th>
                    <th scope="col">Item Count</th>
                    <th scope="col">Total</th>
                    <th scope="col">Recipt</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                  <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ Carbon\Carbon::parse($order->placedDate)->format('jS M Y') }}</td>
                    <td>{{ $order->itemCount}}</td>
                    <td>{{ formatPrice($order->total) }}</td>
                    <td>
                        <a href="{{ route('account.orders.download', $order->id) }}" class="btn btn-indigo btn-sm m-0"><i class="fas fa-download mr-2"></i> Download</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
