@extends('home')
@section('content')

<div class="container mt-3">
    <div class="text-end my-2">
        <a href="{{ route('prospects.create') }}" class="btn btn-primary">
            <span class="svg-icon svg-icon-2">
                <i class="ti ti-plus me-2"></i>
            </span>
            Add Prospect
        </a>
    </div>
    <div class="row ">
        <div class="card col">
         <h5 class="card-header">Prospects List</h5>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Assignee</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($prospects->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-danger">No records found.</td>
                            </tr>
                        @else
                            @foreach ($prospects as $prospect)
                                <tr>
                                    <td>{{ $prospect->id }}</td>
                                    <td>{{ $prospect->first_name }} {{ $prospect->last_name }}</td>
                                    <td>{{ $prospect->email_address }}</td>
                                    <td>{{ $prospect->assignee_id }}</td>
                                    <td>
                                        <a href="{{ route('prospects.edit', $prospect->id) }}">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="{{ route('prospects.delete', $prospect->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="text-danger">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                        <a href="{{ route('prospects.show', $prospect->id) }}">
                                            <i class="ti ti-eye text-info"></i>
                                        </a>
                                        <a href="{{ route('prospects.transferToLeads', $prospect->id) }}" 
                                            onclick="return confirm('Transfer this prospect to leads?')" 
                                            class="text-success">
                                            <i class="ti ti-arrow-right-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection