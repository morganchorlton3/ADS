@extends('layouts.dashboard')

@section('title', 'Jobs')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Jobs')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Job</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jobs.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="title">Job Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="" name="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="pay_rate">Pay per hour</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">£</span>
                                </div>
                                <input type="text" class="form-control @error('pay_rate') is-invalid @enderror" id="pay_rate" name="pay_rate">
                                @error('pay_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-lg-3 mt-1">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Job</button>
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
  $('#type_selector').change(function(){
    qty = $(this).val();
    $('#type').val(qty);
  })
  $('#category_selector').change(function(){
    primary = $(this).val();
    $('#primary_id').val(primary);
  })
</script>
@endsection