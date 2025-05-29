<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use App\Models\Prospect;

use Illuminate\Http\Request;

class LeadController extends Controller
{

    public function index(){
    $leads = Lead::with('prospect')
        ->whereDoesntHave('deal') // this line hides leads already converted to deals
        ->get();
    return view('leads.index', compact('leads'));
}


    public function create($prospectId) {
        $prospect = Prospect::findOrFail($prospectId);
        return view('leads.create', compact('prospect'));
    }

    public function store(Request $request) {
        $prospect = Prospect::findOrFail($request->prospect_id);
        $assigneeCommission = $prospect->assignee ? $request->commission * 0.5 : 0;
        $lead = Lead::where('prospect_id', $request->prospect_id)->first();

        if ($lead) {
            $lead->update([
                'commission' => $request->commission,
                'assignee_commission' => $assigneeCommission,
            ]);
        } else {
            Lead::create([
                'prospect_id' => $request->prospect_id,
                'commission' => $request->commission,
                'assignee_commission' => $assigneeCommission,
            ]);
        }
        return redirect()->route('leads.index')->with('success', 'Lead saved successfully');
    }

    public function delete($id) {
        $delete = Lead::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back();
        }
    }

    public function edit($id) {
        $lead = Lead::with('prospect')->findOrFail($id);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id) {
        $lead = Lead::findOrFail($id);
        $prospect = Prospect::findOrFail($lead->prospect_id);
        $assigneeCommission = $prospect->assignee ? $request->commission * 0.5 : 0;
        $lead->update([
            'commission' => $request->commission,
            'assignee_commission' => $assigneeCommission,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully');
    }
}
