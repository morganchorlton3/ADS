@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Edit user')

@section('content')
<div class="row h-300">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user) }}" method="POSt">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled class="form-control" id="email" value="{{ $user->email}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" value="{{ $user->company}}" name="company">
                            </div>
                            <div class="form-group">
                                <input type="text" hidden value="user" name="role" id="role">
                                <label for="role_selector">Role</label>
                                <select id="role_selector" class="form-control">
                                    <option>Choose...</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit User</button>
                </form>
            </div>
        </div>
    </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header">
                    User Statistics
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Last Login</label>
                                <p>{{ formatDate($user->last_login_at) }}</p>
                            </div>
                            <div class="form-group">
                                <label for="name">User Created</label>
                                <p>{{ formatDate($user->created_at) }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Last Login Ip</label>
                                <p>{{ $user->last_login_ip }}</p>
                            </div>
                        </div>
                    </div>
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