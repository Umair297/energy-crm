<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Lead;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::with('lead.prospect')->get();
        return view('deals.index', compact('deals'));
    }

    public function create($leadId)
    {
        $lead = Lead::with('prospect')->findOrFail($leadId);
        return view('deals.create', compact('lead'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'status' => 'required|string',
            'final_amount' => 'required|numeric',
        ]);

        Deal::create($request->only('lead_id', 'status', 'final_amount'));

        return redirect()->route('deals.index')->with('success', 'Deal created successfully!');
    }

    public function delete($id){
        $deals = Deal::find($id);
        $deals->delete();
        return redirect()->back();
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,won,lost',
        ]);

        $deal = Deal::findOrFail($id);
        $deal->status = $request->status;
        $deal->save();

        return redirect()->route('deals.index')->with('success', 'Deal updated successfully!');
    }


}
