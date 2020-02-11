@extends('layouts.dashboard')

@section('title', 'Deliveries')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Delivery Schedule')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Delivery Schedule</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.delivery.create') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="day">Day</label>
                            <input type="text" value="" name="day" id="day" hidden>
                            <select onchange="val()" id="day_selector" class="form-control @error('day') is-invalid @enderror">  
                                <option>Select day..</option>                     
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                            @error('day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="start">Shift Start Time</label>
                            <input type="text" class="form-control @error('start') is-invalid @enderror" id="start" value="" name="start" placeholder="00:00">
                            @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="end">Shift End Time</label>
                            <input type="text" class="form-control @error('end') is-invalid @enderror" id="end" value="" name="end" placeholder="00:00">
                            @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 mt-2">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Shifts</h6>
            </div>
            <div class="card-body">
                <h3 class="text-center">Shifts</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shifts as $shift)
                        <tr>
                            <th>{{ getDay($shift->day) }}</th>
                            <th>{{ $shift->start }}</th>
                            <th>{{ $shift->end }}</th>
                            <th>
                                <form action="{{ route('admin.delivery.destroy') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="text" hidden name="id" value="{{ $shift->id }}">
                                    <button type="submit" class="btn btn-link align-middle"><a href="" class="text-dark text-center"><div class="col-1 text-center"><i class="delete fa fa-trash"></i></div></i></a></button>
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
@endsection
@section('addedJS')
<script>
  $('#day_selector').change(function(){
    day = $(this).val();
    $('#day').val(day);
  })
</script>
@endsection