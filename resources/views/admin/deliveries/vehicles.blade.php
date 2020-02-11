@extends('layouts.dashboard')

@section('title', 'Delivery Vehicles')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Delivery Vehicles')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delivery Vehicles</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.vehicle.create') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="registration">Registration</label>
                            <input type="text" class="form-control @error('registration') is-invalid @enderror" id="registration" value="" name="registration" placeholder="AB12 CDE">
                            @error('registration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="mileage">Mileage</label>
                            <input type="text" class="form-control @error('mileage') is-invalid @enderror" id="mileage" value="" name="mileage" placeholder="000000">
                            @error('mileage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="capacity">Load Capacity</label>
                            <input type="text" class="form-control @error('capacity') is-invalid @enderror" id="capacity" value="" name="capacity" placeholder="3000KG">
                            @error('capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 mt-2">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Delivery Vehicle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delivery Vehicle</h6>
            </div>
            <div class="card-body">
                <h3 class="text-center">Delivery Vehicle</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Registration</th>
                            <th scope="col">mileage</th>
                            <th scope="col">Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vans as $van)
                        <tr>
                            <th>{{ $van->id }}</th>
                            <th>{{ $van->registration }}</th>
                            <th>{{ $van->mileage }}</th>
                            <th>{{ $van->capacity }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('addedJS')
<script>
  $('#day_selector').change(function(){
    day = $(this).val();
    $('#day').val(day);
  })
</script>
@endsection