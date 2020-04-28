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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Run</th>
                                <th scope="col">Orders</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Assign Driver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicleRuns as $run)
                            <tr>
                                <th>{{ $run->run }}</th>
                                <th>{{ 10 }}</th>
                                <th>{{ $run->runTime }}</th>
                                <th>{{ $run->runEnd }}</th>
                                <th>
                                    <form action="{{ route('admin.delivery.assignDriver') }}" method="POST">
                                        @CSRF
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <select class="form-control" name="driver">
                                                    @if($run->driverID == null){
                                                        <option selected >No Driver Selected</option>
                                                    @else
                                                        <option selected value="{{$run->driverID}}">{{ $run->driver->first_name . ' ' . $run->driver->last_name }}</option>  
                                                    @endif
                                                    @foreach($drivers as $driver)
                                                    <option value="{{$driver->id}}">{{ $driver->first_name . ' ' . $driver->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" hidden name="id" value="{{ $run->id }}">
                                            <div class="col-lg-4">
                                                <button class="btn" type="submit" ><i class="fas fa-sync"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
