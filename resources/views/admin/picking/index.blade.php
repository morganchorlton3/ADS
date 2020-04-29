@extends('layouts.dashboard')

@section('title', 'Deliveries')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Delivery Schedule')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Picking</h6>
            </div>
            <div class="card-body">
                <h3 class="text-center">Picking</h3>
                <p>Items left to pick: {{$pickingCount }}</p>
            </div>  
        </div>
    </div>
</div>
@endsection
