@extends('home')
@section('content')
<div class="container mt-4">
    <h4>Follow-ups for {{ $deal->lead->prospect->first_name }} {{ $deal->lead->prospect->last_name }}</h4>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <!-- Follow-up form -->
    <div class="card mt-3 mb-4">
        <div class="card-header">Add New Follow-up</div>
        <div class="card-body">
            <form action="{{ route('followups.store', $deal->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Note</label>
                    <input type="text" name="note" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Follow-up Date</label>
                    <input type="datetime-local" name="followup_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Follow-up</button>
            </form>
        </div>
    </div>

    <!-- Follow-up history -->
    <div class="card">
        <div class="card-header">Follow-up History</div>
        <div class="card-body">
            @forelse($deal->followups as $followup)
                <div>
                    📅 {{ \Carbon\Carbon::parse($followup->followup_date)->format('d M, Y h:i A') }}<br>
                    📝 {{ $followup->note }}
                    <hr>
                </div>
            @empty
                <p>No follow-ups found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
