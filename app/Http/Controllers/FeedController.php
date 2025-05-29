<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Prospect;
use App\Http\Controllers\ProspectController;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function store(Request $request, Prospect $prospect)
    {
        $request->validate([
            'type' => 'required|in:call,email,quote',
            'event_time' => 'nullable|date',
            'details' => 'nullable|string',
        ]);

        $prospect->feeds()->create([
            'type' => $request->type,
            'event_time' => $request->event_time,
            'details' => $request->details,
        ]);

        return redirect()->route('feed.show', $prospect->id)->with('success', 'Feed added successfully!');
    }
    
    public function feedshow($id) {
        $prospect = Prospect::with('feeds')->findOrFail($id);
        return view('leads.feed', compact('prospect'));
    }
}
