@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('breadcrumb-title', 'Dashboard')

@section('breadcrumb', 'Manage Users')

@section('content')
<div class="table100 ver2 m-b-110">
    <table class="table">
        <thead>
            <tr class="row100 head">
                <th class="cell100 column1"># Employee Number</th>
                <th class="cell100 column2">First Name</th>
                <th class="cell100 column3">last Name</th>
                <th class="cell100 column3">Job Title</th>
                <th class="cell100 column6">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $employee)
                <tr class="row100 body">
                    <td class="cell100 column1">{{ sprintf('%04d', $employee->id) }}</td>
                    <td class="cell100 column2">{{ $employee->first_name }}</td>
                    <td class="cell100 column3">{{ $employee->last_name }}</td>
                    <td class="cell100 column3">{{ getJobRole($employee->job_id) }}</td>
                    <td class="cell100 column6">
                        <a href="{{ route('admin.users.edit', $employee->id) }}" class="pr-2 pl-2">
                            <button type="button" class="btn btn-sm btn-primary">Manage Employee</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 mt-4 mb-4">
            <div class="d-flex justify-content-center">
                {{ $staff->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection
