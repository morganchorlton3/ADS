@extends('layouts.dashboard')

@section('title', 'Create Product')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Create Product')

@section('content')
<div class="row h-300">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Products
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Slug</th>
                            <th scope="col">name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row"><img src="{{ asset('ProductImages/' . $product->slug . '/' . $product->slug . '.jpeg') }}" ></th>
                                <th>{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
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
    $('#role_selector').change(function(){
        role = $(this).val();
        $('#role').val(role);
    });
  </script>
@endsection