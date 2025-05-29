<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prospect;
use App\Models\Lead;
use App\Models\Deal; // If you have a Deal model

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProspects = Prospect::count();
        $totalLeads = Lead::count();
        $totalDeals = Deal::count(); // Optional, if you have a deals table

        return view('dashboard.index', compact('totalUsers', 'totalProspects', 'totalLeads', 'totalDeals'));
    }
}
