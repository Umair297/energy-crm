<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\Lead;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Prospect::where('is_hidden', 0)->get();
        return view('prospects.index', compact('prospects'));
    }

    public function create()
    {
        return view('prospects.create');
    }

    public function store(Request $request) {
        $data = new Prospect;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->contact_number = $request->contact_number;
        $data->email_address = $request->email_address;
        $data->business_address = json_encode($request->business_address);
        $data->home_address = $request->home_address;
        $data->limited_company = json_encode($request->limited_company);
        $data->limited_company_number = json_encode($request->limited_company_number);
        $data->charity = json_encode($request->charity);
        $data->sole_trader = json_encode($request->sole_trader);
        $data->current_supplier_gas = json_encode($request->current_supplier_gas);
        $data->current_supplier_electricity = json_encode($request->current_supplier_electricity);
        $data->contract_end_date_gas = json_encode($request->contract_end_date_gas);
        $data->contract_end_date_electricity = json_encode($request->contract_end_date_electricity);
        $data->mprn_number = json_encode($request->mprn_number);
        $data->mpan_number = json_encode($request->mpan_number);
        $data->eac = json_encode($request->eac);
        $data->aq = json_encode($request->aq);
        $data->bank_name = $request->bank_name;
        $data->bank_account_name = $request->bank_account_name;
        $data->account_number = $request->account_number;
        $data->sort_code = $request->sort_code;
        $data->assignee_id = $request->assignee_id;
        $data->additional_details = $request->additional_details;
        $data->is_hidden = 0;
        $data->save();
        return redirect()->route('prospects.index')->with('success', 'Prospect created successfully!');
    }

    public function show($id) {
        $prospect = Prospect::findOrFail($id);
        $jsonFields = [
            'business_address', 'limited_company', 'limited_company_number', 'charity', 'sole_trader',
            'current_supplier_gas', 'current_supplier_electricity', 'contract_end_date_gas', 'contract_end_date_electricity',
            'mprn_number', 'mpan_number', 'eac', 'aq'
        ];
        foreach ($jsonFields as $field) {
            $prospect->$field = json_decode($prospect->$field ?? '[]', true);
        }
        return view('prospects.show', compact('prospect'));
    }

    public function delete($id) {
        $delete = Prospect::find($id);
        if ($delete) {
            $delete->delete();
            return redirect()->back();
        }
    }

    public function edit($id) {
        $display = Prospect::find($id);
        $prospects = Prospect::all();
        if ($display) {
            return view('prospects.edit', compact('prospects'))->with('prospect', $display);

        }
        return redirect()->back()->with('error', 'Record not found!');
    }

    public function update(Request $request, $id) {
        $prospect = Prospect::findOrFail($id);
        $prospect->first_name = $request->first_name;
        $prospect->last_name = $request->last_name;
        $prospect->contact_number = $request->contact_number;
        $prospect->email_address = $request->email_address;
        $prospect->business_address = json_encode($request->business_address ?? []);
        $prospect->home_address = $request->home_address;
        $prospect->limited_company = json_encode($request->limited_company ?? []);
        $prospect->limited_company_number = json_encode($request->limited_company_number ?? []);
        $prospect->charity = json_encode($request->charity ?? []);
        $prospect->sole_trader = json_encode($request->sole_trader ?? []);
        $prospect->current_supplier_gas = json_encode($request->current_supplier_gas ?? []);
        $prospect->current_supplier_electricity = json_encode($request->current_supplier_electricity ?? []);
        $prospect->contract_end_date_gas = json_encode($request->contract_end_date_gas ?? []);
        $prospect->contract_end_date_electricity = json_encode($request->contract_end_date_electricity ?? []);
        $prospect->mprn_number = json_encode($request->mprn_number ?? []);
        $prospect->mpan_number = json_encode($request->mpan_number ?? []);
        $prospect->eac = json_encode($request->eac ?? []);
        $prospect->aq = json_encode($request->aq ?? []);
        $prospect->bank_name = $request->bank_name;
        $prospect->bank_account_name = $request->bank_account_name;
        $prospect->account_number = $request->account_number; 
        $prospect->sort_code = $request->sort_code;
        $prospect->assignee_id = $request->assignee_id;
        $prospect->additional_details = $request->additional_details;
        $prospect->save();

        return redirect()->route('prospects.index')->with('success', 'Prospect updated successfully.');
    }

    public function transferToLeads($id) {
        $prospect = Prospect::findOrFail($id);
        $existingLead = Lead::where('prospect_id', $prospect->id)->first();
        if ($existingLead) {
            return redirect()->back()->with('error', 'This prospect is already linked to a lead!');
        }
        $lead = new Lead();
        $lead->prospect_id = $prospect->id;
        $lead->save();
        $prospect->is_hidden = 1;
        $prospect->save();

        return redirect()->back()->with('success', 'Prospect successfully linked to Lead!');
    }

}
