@extends('home')
@section('content')

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4>Prospect Detail</h4>
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" class="form-control" value="{{ $prospect->first_name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" class="form-control" value="{{ $prospect->last_name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Contact Number</label>
                <input type="text" class="form-control" value="{{ $prospect->contact_number }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Email Address</label>
                <input type="email" class="form-control" value="{{ $prospect->email_address }}" readonly>
            </div>
            <div class="col-md-12 mb-3">
                <label>Business Address</label>
                <div id="business-address-section">
                    @foreach ($prospect->business_address as $address)
                    <input type="text" class="form-control mb-2" value="{{ $address }}" readonly>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label>Home Address</label>
                <input type="text" class="form-control" value="{{ $prospect->home_address }}" readonly>
            </div>
            <div class="col-md-12 mb-3">
                <label>Business Types</label>
                @foreach ($prospect->limited_company as $index => $company)
                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $company }}" readonly placeholder="Limited Company">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->limited_company_number[$index] ?? '' }}" readonly placeholder="Company Number">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->charity[$index] ?? '' }}" readonly placeholder="Charity">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->sole_trader[$index] ?? '' }}" readonly placeholder="Sole Trader">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 mb-3">
                <label>Suppliers</label>
                @foreach ($prospect->current_supplier_gas as $index => $gas)
                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $gas }}" readonly placeholder="Gas Supplier">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->current_supplier_electricity[$index] ?? '' }}" readonly placeholder="Electricity Supplier">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" value="{{ $prospect->contract_end_date_gas[$index] ?? '' }}" readonly placeholder="Gas End Date">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" value="{{ $prospect->contract_end_date_electricity[$index] ?? '' }}" readonly placeholder="Electricity End Date">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 mb-3">
                <label>MPRN / MPAN / EAC / AQ</label>
                @foreach ($prospect->mprn_number as $index => $mprn)
                <div class="row mb-2">
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $mprn }}" readonly placeholder="MPRN">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->mpan_number[$index] ?? '' }}" readonly placeholder="MPAN">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->eac[$index] ?? '' }}" readonly placeholder="EAC">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ $prospect->aq[$index] ?? '' }}" readonly placeholder="AQ">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6 mb-3">
                <label>Bank Name</label>
                <input type="text" class="form-control" value="{{ $prospect->bank_name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Name on Card</label>
                <input type="text" class="form-control" value="{{ $prospect->bank_account_name }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Account Number</label>
                <input type="text" class="form-control" value="{{ $prospect->account_number }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label>Sort Code</label>
                <input type="text" class="form-control" value="{{ $prospect->sort_code }}" readonly>
            </div>

            <div class="col-md-12 mb-3">
                <label>Assignee</label>
                <input type="text" class="form-control" value="{{ $prospect->assignee_id }}" readonly>
            </div>

            <div class="col-md-12 mb-3">
                <label>Additional Details</label>
                <textarea class="form-control" rows="3" readonly>{{ $prospect->additional_details }}</textarea>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
