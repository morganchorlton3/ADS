@extends('layouts.dashboard')

@section('title', 'Staff')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Staff')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
            </div>
            <div class="card-body">
            <form action="{{ route('admin.staff.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="" name="first_name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="" name="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="" name="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="job_title">Job Title</label>
                            <input hidden type="text" value="" name="job_title" id="job_title">
                            <select onchange="val()" id="job_selector" class="form-control @error('job_title') is-invalid @enderror">  
                                <option></option>                     
                                @foreach($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->title }}</option> 
                                @endforeach
                            </select>
                            @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                   {{-- <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="address_line_1">Address Line 1</label>
                            <input type="text" class="form-control @error('address_line_1') is-invalid @enderror" id="address_line_1" value="" name="address_line_1">
                            @error('address_line_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="address_line_2">Address Line 2</label>
                            <input type="text" class="form-control @error('address_line_2') is-invalid @enderror" id="address_line_2" value="" name="address_line_2">
                            @error('address_line_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="address_line_3">Address Line 3</label>
                            <input type="text" class="form-control @error('address_line_3') is-invalid @enderror" id="address_line_3" value="" name="address_line_3">
                            @error('address_line_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="post_code">Post Code</label>
                            <input type="text" class="form-control @error('post_code') is-invalid @enderror" id="post_code" value="" name="post_code">
                            @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-lg-3 mt-1">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Employee</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('addedJS')
<script>
  $('#job_selector').change(function(){
    job = $(this).val();
    $('#job_title').val(job);
  })
  $('#category_selector').change(function(){
    primary = $(this).val();
    $('#primary_id').val(primary);
  })
</script>
@endsection