@extends('home')
@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">Deal Details</div>
        <div class="card-body">
            <form action="{{ route('deals.store') }}" method="POST">
                @csrf
                <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="won">Won</option>
                        <option value="lost">Lost</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Final Amount</label>
                    <input type="number" name="final_amount" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-success">Save Deal</button>
            </form>
        </div>
    </div>
</div>
@endsection
