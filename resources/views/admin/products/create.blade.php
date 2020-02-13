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
                <form action="{{ route('admin.product.new') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" id="barcode" value="" name="barcode">
                                    @error('barcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="name">Short Description</label>
                                    <textarea type="text" class="form-control @error('shortDesc') is-invalid @enderror" style="height: 8vh;" id="shortDesc" value="" name="shortDesc"></textarea>
                                    @error('shortDesc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="name">Detailed Description</label>
                                    <textarea type="text" class="form-control @error('detailedDesc') is-invalid @enderror" style="height: 15vh;" id="detailedDesc" value="" name="detailedDesc"></textarea>
                                    @error('detailedDesc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="price">Price</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">£</span>
                                </div>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="name">Image</label>
                            <input type="file" name="image" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="type">Category</label>
                            <input value="" name="category" id="category_id">
                            <select onchange="val()" id="category_id_selector" class="form-control @error('type') is-invalid @enderror">  
                                <option></option>                     
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn btn-primary form-control">Create Product</button>
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
    $('#category_id_selector').change(function(){
        category = $(this).val();
        $('#category_id').val(category);
    });
  </script>
@endsection