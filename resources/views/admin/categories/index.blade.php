@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">New Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="type">Category Type</label>
                            <input hidden type="text" value="" name="type" id="type">
                            <select onchange="val()" id="type_selector" class="form-control @error('type') is-invalid @enderror">  
                                <option></option>                     
                                <option value="1">Primary Category</option>
                                <option value="2">Sub Category</option>
                                <option value="3">Sub Sub Category</option>
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputName">Primary Category</label>
                            <input hidden type="text" value="" name="primary" id="primary">
                            <select onchange="val()" id="primary_selector" class="form-control @error('primary') is-invalid @enderror"> 
                                <option></option>
                                @foreach($categories as $category) 
                                <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                @endforeach
                            </select>
                            @error('sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 mt-1">
                            <button type="submit" class="btn btn-primary form-control mt-4">Create Product</button>
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
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th>{{ $category->name }}</th>
                          <th>
                                <form action="{{ route('admin.category.destroy') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="text" hidden name="id" value="{{ $category->id }}">
                                    <button type="submit" class="btn btn-link align-middle"><a href="" class="text-dark text-center"><div class="col-1 text-center"><i class="delete fa fa-trash"></i></div></i></a></button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <h3 class="text-center">Sub Category</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Primary Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subCategory as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <th>{{ $category->name }}</th>
                            <th>
                                <select onchange="val()" id="category_selector" class="form-control @error('primary') is-invalid @enderror">  
                                    <option>{{ checkPrimaryCat($category->parent_id)}}</option>
                                </select>
                            </th>
                            <th>
                                <div class="row">
                                {{-- <form action="{{ route('admin.category.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" name="id" value="{{ $category->id }}">
                                    <input type="text" name="primary_id" id="primary_id">
                                    <button type="submit" class="btn btn-link align-middle"><a href="" class="text-dark text-center"><div class="col-1 text-center"><i class="delete fa fa-refresh"></i></div></a></button>
                                </form> --}}
                                <form action="{{ route('admin.category.destroy') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="text"  hidden name="id" value="{{ $category->id }}">
                                    <button type="submit" class="btn btn-link align-middle"><a href="" class="text-dark text-center"><div class="col-1 text-center"><i class="delete fa fa-trash"></i></div></a></button>
                                </form>
                                </div>
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