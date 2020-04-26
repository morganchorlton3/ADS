@extends('layouts.dashboard')

@section('title', 'Deliveries')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Delivery Schedule')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Shifts</h6>
            </div>
            <div class="card-body">
                <h3 class="text-center">Shifts</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Run</th>
                            <th scope="col">Orders</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicleRuns as $run)
                        <tr>
                            <th>{{ $run->run }}</th>
                            <th>{{ 10 }}</th>
                            <th>{{ $run->runTime }}</th>
                            <th>{{ $run->runEnd }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
