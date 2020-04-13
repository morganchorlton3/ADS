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
                            <th scope="col">Date</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($runs as $run)
                        <tr>
                            <th>{{ $run->id}}</th>
                            <th>{{ $run->runCount }}</th>
                            <th>{{ $run->date }}</th>
                            <th><a href="" class="btn btn-primary align-middle">Print</a></th>
                            
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