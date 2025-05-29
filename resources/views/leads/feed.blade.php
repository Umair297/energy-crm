@extends('home')

@section('content')
<div class="container mt-4">
    <h4>Feeds for {{ $prospect->first_name }} {{ $prospect->last_name }}</h4>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <!-- Add New Feed Form -->
    <div class="card mt-3 mb-4">
        <div class="card-header">Add Feed Note</div>
        <div class="card-body">
            <form action="{{ route('feeds.store', $prospect->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Type</label>
                    <select name="type" class="form-control" required>
                        <option value="call">Call</option>
                        <option value="email">Email</option>
                        <option value="quote">Quote</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Date & Time</label>
                    <input type="datetime-local" name="event_time" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Details</label>
                    <textarea name="details" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Feed</button>
            </form>
        </div>
    </div>

    <!-- Feed History -->
    <div class="card">
        <div class="card-header">Feed History</div>
        <div class="card-body">
            @forelse($prospect->feeds as $feed)
                <div class="mb-3">
                    📅 {{ \Carbon\Carbon::parse($feed->event_time)->format('d M, Y h:i A') }}<br>
                    📝 <strong>{{ ucfirst($feed->type) }}</strong> — {{ $feed->details }}
                    <hr>
                </div>
            @empty
                <p>No feed entries found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
