@extends('layouts.dashboard')

@section('content')
<style>

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.create')}}" method="POST">
                    @csrf
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection