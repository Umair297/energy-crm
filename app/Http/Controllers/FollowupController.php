<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Followup;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    // Show follow-up page (form + history)
    public function create($dealId)
    {
        $deal = Deal::with(['followups', 'lead.prospect'])->findOrFail($dealId);
        return view('followup.create', compact('deal'));
    }

    // Store follow-up
    public function store(Request $request, $dealId)
    {
        $request->validate([
            'note' => 'required|string',
            'followup_date' => 'required|date',
        ]);

        Followup::create([
            'deal_id' => $dealId,
            'note' => $request->note,
            'followup_date' => $request->followup_date,
        ]);

        return redirect()->route('followup.create', $dealId)->with('success', 'Follow-up added');
    }
}
