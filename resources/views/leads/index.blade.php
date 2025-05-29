@extends('home')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="card col">
            <h5 class="card-header">Leads</h5>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Prospect</th>
                            <th>Commission</th>
                            <th>Assignee Commission</th>
                            <th>Action</th>
                            <th>Operator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>{{ $lead->prospect->first_name }} {{ $lead->prospect->last_name }}</td>
                                <td>{{ $lead->commission }}</td>
                                <td>{{ $lead->assignee_commission }}</td>
                                <td>
                                    <a href="{{ route('leads.edit', $lead->id) }}">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="{{ route('leads.delete', $lead->id) }}" class="text-danger">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                    <a href="{{ route('prospects.show', $lead->prospect_id) }}">
                                        <i class="ti ti-eye text-info"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('leads.create', $lead->prospect_id) }}" class="btn btn-sm btn-primary">Add Entries</a>
                                    <a href="{{ route('deals.create', $lead->id) }}" class="btn btn-sm btn-primary">Convert to Deal</a>
                                    <a href="{{ route('feed.show', $lead->prospect_id) }}" class="btn btn-sm btn-primary">Add Feed</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No leads found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
