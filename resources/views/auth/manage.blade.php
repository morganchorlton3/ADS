@extends('layouts.app-no-cart')

@section('style')

@endsection

@section('content')
<div class="row">
<div class="col-lg-4">
    <div class="card d-flex justify-content-center">
        <div class="card-body d-flex flex-column text-center">
            <h1><i class="fa fa-user"></i></h1>
            <h5 class="card-title">Profile</h5>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <a href="{{ route('cart.add', 1) }}" class="btn btn-primary btn-lg btn-block">Manage Profile</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card d-flex justify-content-center">
        <div class="card-body d-flex flex-column text-center">
            <h1><i class="fa fa-shopping-cart"></i></h1>
            <h5 class="card-title">Orders</h5>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <a href="{{ route('cart.add', 1) }}" class="btn btn-primary btn-lg btn-block">Manage Orders</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card d-flex justify-content-center">
        <div class="card-body d-flex flex-column text-center">
            <h1><i class="fa fa-home"></i></h1>
            <h5 class="card-title">Orders</h5>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <a href="{{ route('cart.add', 1) }}" class="btn btn-primary btn-lg btn-block">Manage Address</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
