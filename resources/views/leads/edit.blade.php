@extends('home')
@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Edit Entry
        </div>
        <div class="card-body">
            <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="commission" class="form-label">Commission Amount</label>
                    <input type="number" name="commission" id="commission" value="{{ $lead->commission }}" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Entry</button>
            </form>
        </div>
    </div>
</div>
@endsection
