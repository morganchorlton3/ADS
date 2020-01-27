@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Manage Users')

@section('content')
<div class="table100 ver2 m-b-110">
    <table class="table">
        <thead>
            <tr class="row100 head">
                <th class="cell100 column1">#</th>
                <th class="cell100 column2">First Name</th>
                <th class="cell100 column3">last Name</th>
                <th class="cell100 column4">Email</th>
                <th class="cell100 column5">Address</th>
                <th class="cell100 column6">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="row100 body">
                    <td class="cell100 column1">{{ $user->id }}</td>
                    <td class="cell100 column2">{{ $user->first_name }}</td>
                    <td class="cell100 column3">{{ $user->last_name }}</td>
                    <td class="cell100 column4">{{ $user->email }}</td>
                    <td class="cell100 column5">
                        {{ $user->address->address_line_1 }},</br>
                        @if(!$user->address->address_line_2 == "")
                            {{ $user->address->address_line_2 }},</br>
                        @endif
                        @if(!$user->address->address_line_3 == "")
                            {{ $user->address->address_line_3 }},</br>
                        @endif
                        {{ $user->address->post_code }}
                    
                    </td>
                    <td class="cell100 column6">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="pr-2 pl-2">
                            <button type="button" class="btn btn-sm btn-primary">Manage User</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 mt-4 mb-4">
            <div class="d-flex justify-content-center">
                {{ $users->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection
