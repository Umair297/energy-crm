<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;

class CalendarController extends Controller
{
    public function index()
    {
        // Get all deals with followups and prospect info
        $deals = Deal::with(['lead.prospect', 'followups'])->get();

        // Prepare events
        $events = [];

        foreach ($deals as $deal) {
    foreach ($deal->followups as $followup) {
        $events[] = [
            'title' => 'Follow-up: ' . $deal->lead->prospect->first_name,
            'start' => $followup->followup_date,
            'extendedProps' => [
                'note' => $followup->note,
                'prospect' => $deal->lead->prospect->first_name . ' ' . $deal->lead->prospect->last_name,
                'status' => $deal->status,
                'amount' => $deal->amount,
                'commission' => $deal->lead->commission,
            ],
        ];
    }
}


        return view('calendar.index', compact('events'));
    }
}
