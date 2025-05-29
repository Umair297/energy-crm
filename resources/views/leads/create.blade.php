@extends('home')
@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Add Entry
        </div>
        <div class="card-body">
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf
                <input type="hidden" name="prospect_id" value="{{ $prospect->id }}">

                <div class="mb-3">
                    <label for="commission" class="form-label">Commission Amount</label>
                    <input type="number" name="commission" id="commission" class="form-control" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-success">Save Entry</button>
            </form>
        </div>
    </div>
</div>
@endsection
