@extends('layouts.dashboard')

@section('title', 'Store Locations')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Store Locations')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Store</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="name">Store Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="type">Store Post Code</label>
                            <input type="text" class="form-control @error('post_code') is-invalid @enderror" id="post_code" value="" name="post_code">
                            @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 mt-1">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Store Location</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-center">Category</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Post Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stores as $store)
                        <tr>
                            <th>{{ $store->id }}</th>
                            <th>{{ $store->name }}</th>
                            <th>{{ $store->post_code }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection