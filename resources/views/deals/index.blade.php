@extends('home')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="card col">
         <h5 class="card-header">All Deals</h5>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Prospect Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Lead Commission</th>
                            <th>Follow-ups</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deals as $deal)
                        <tr>
                            <td>{{ $deal->lead->prospect->first_name }} {{ $deal->lead->prospect->last_name }}</td>
                            <td>{{ ucfirst($deal->status) }}</td>
                            <td>${{ number_format($deal->amount, 2) }}</td>
                            <td>${{ number_format($deal->lead->commission, 2) }}</td>
                            <td>
                                <a href="{{ route('followup.create', $deal->id) }}" class="btn btn-sm btn-secondary">
                                    Add Follow-up
                                </a>
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edituser-{{ $deal->id }}">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="{{ route('deals.delete', $deal->id) }}" class="text-danger">
                                    <i class="ti ti-trash"></i>
                                </a>
                                <a href="{{ route('prospects.show', $deal->lead->prospect->id) }}">
                                    <i class="ti ti-eye text-info"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edituser-{{ $deal->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('deals.update', $deal->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Deal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $deal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="won" {{ $deal->status == 'won' ? 'selected' : '' }}>Won</option>
                            <option value="lost" {{ $deal->status == 'lost' ? 'selected' : '' }}>Lost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Deal</button>
                </div>
            </form>
        </div>
    </div>
</div>

                        @empty
                            <tr>
                                <td colspan="5">No deals found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
