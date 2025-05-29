@extends('home')

@section('content')
<div class="container">
    <div class="row gy-4 gx-3">

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-3 rounded-circle">
                        <i class="ti ti-user ti-28px"></i>
                    </div>
                    <h5 class="card-title mb-1">Total Users</h5>
                    <p class="text-heading mb-3 mt-1">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-3 rounded-circle">
                        <i class="ti ti-user-circle ti-28px"></i>
                    </div>
                    <h5 class="card-title mb-1">Total Prospects</h5>
                    <p class="text-heading mb-3 mt-1">{{ $totalProspects }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-3 rounded-circle">
                        <i class="ti ti-user-plus ti-28px"></i>
                    </div>
                    <h5 class="card-title mb-1">Total Leads</h5>
                    <p class="text-heading mb-3 mt-1">{{ $totalLeads }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <div class="badge p-2 bg-label-success mb-3 rounded-circle">
                        <i class="ti ti-briefcase ti-28px"></i>
                    </div>
                    <h5 class="card-title mb-1">Total Deals</h5>
                    <p class="text-heading mb-3 mt-1">{{ $totalDeals }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
