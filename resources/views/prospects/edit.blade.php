@extends('home')
@section('content')

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4 class="mb-4">Edit Prospect</h4>
        <form action="{{ route('prospects.update', $prospect->id) }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $prospect->first_name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $prospect->last_name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $prospect->contact_number) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email_address" class="form-control" value="{{ old('email_address', $prospect->email_address) }}" required>
                </div>

                <!-- Business Address Multiple -->
                <div class="col-md-12 mb-3">
                    <label>Business Address (Multiple Sites)</label>
                    <div id="business-address-group">
                        @php
                            $businessAddresses = json_decode($prospect->business_address, true) ?? [];
                        @endphp
                        @foreach($businessAddresses as $address)
                            <div class="input-group mb-2">
                                <textarea name="business_address[]" class="form-control" rows="2" required>{{ $address }}</textarea>
                                <button type="button" class="btn btn-danger ms-2" onclick="this.parentElement.remove()">-</button>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="addBusinessAddress()">+</button>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Home Address</label>
                    <textarea name="home_address" class="form-control" rows="2">{{ old('home_address', $prospect->home_address) }}</textarea>
                </div>

                <!-- Limited Company Multiple -->
                <div class="col-md-12 mb-3">
                    <label>Limited Company / Charity / Sole Trader (Multiple Entities)</label>
                    <div id="limited-company-group">
                        @php
                            $limitedCompanies = json_decode($prospect->limited_company, true) ?? [];
                            $limitedCompanyNumbers = json_decode($prospect->limited_company_number, true) ?? [];
                            $charities = json_decode($prospect->charity, true) ?? [];
                            $soleTraders = json_decode($prospect->sole_trader, true) ?? [];
                        @endphp
                        @foreach($limitedCompanies as $i => $company)
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-3">
                                    <input type="text" name="limited_company[]" class="form-control" placeholder="Limited Company" value="{{ $company }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="limited_company_number[]" class="form-control" placeholder="Limited Company Number" value="{{ $limitedCompanyNumbers[$i] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="charity[]" class="form-control" placeholder="Charity" value="{{ $charities[$i] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="sole_trader[]" class="form-control" placeholder="Sole Trader" value="{{ $soleTraders[$i] ?? '' }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="addLimitedCompany()">+</button>
                    </div>
                </div>

                <!-- Current Supplier and Contract End Dates -->
                <div class="col-md-12 mb-3">
                    <label>Current Supplier and Contract End Dates (Multiple Contracts)</label>
                    <div id="current-supplier-group">
                        @php
                            $currentSupplierGas = json_decode($prospect->current_supplier_gas, true) ?? [];
                            $currentSupplierElec = json_decode($prospect->current_supplier_electricity, true) ?? [];
                            $contractEndGas = json_decode($prospect->contract_end_date_gas, true) ?? [];
                            $contractEndElec = json_decode($prospect->contract_end_date_electricity, true) ?? [];
                        @endphp
                        @foreach($currentSupplierGas as $i => $gasSupplier)
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-3">
                                    <input type="text" name="current_supplier_gas[]" class="form-control" placeholder="Current Supplier (Gas)" value="{{ $gasSupplier }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="current_supplier_electricity[]" class="form-control" placeholder="Current Supplier (Electricity)" value="{{ $currentSupplierElec[$i] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="contract_end_date_gas[]" class="form-control" placeholder="Contract End Date (Gas)" value="{{ $contractEndGas[$i] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="contract_end_date_electricity[]" class="form-control" placeholder="Contract End Date (Electricity)" value="{{ $contractEndElec[$i] ?? '' }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="addCurrentSupplier()">+</button>
                    </div>
                </div>

                <!-- MPRN, MPAN, EAC, AQ -->
                <div class="col-md-12 mb-3">
                    <label>MPRN, MPAN, EAC, AQ (Multiple Sites)</label>
                    <div id="mprn-group">
                        @php
                            $mprns = json_decode($prospect->mprn_number, true) ?? [];
                            $mpans = json_decode($prospect->mpan_number, true) ?? [];
                            $eacs = json_decode($prospect->eac, true) ?? [];
                            $aqs = json_decode($prospect->aq, true) ?? [];
                        @endphp
                        @foreach($mprns as $i => $mprn)
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-3">
                                    <input type="text" name="mprn_number[]" class="form-control" placeholder="MPRN Number" value="{{ $mprn }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="mpan_number[]" class="form-control" placeholder="MPAN Number" value="{{ $mpans[$i] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="eac[]" class="form-control" placeholder="EAC" value="{{ $eacs[$i] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="aq[]" class="form-control" placeholder="AQ" value="{{ $aqs[$i] ?? '' }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="addMprn()">+</button>
                    </div>
                </div>

                <!-- Other fields -->
                <div class="col-md-6 mb-3">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $prospect->bank_name) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Name on Card</label>
                    <input type="text" name="bank_account_name" class="form-control" value="{{ old('bank_account_name', $prospect->bank_account_name) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Account Number</label>
                    <input type="text" name="account_number" class="form-control" value="{{ old('account_number', $prospect->account_number) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Sort Code</label>
                    <input type="text" name="sort_code" class="form-control" value="{{ old('sort_code', $prospect->sort_code) }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Assignee</label>
                    <input type="text" name="assignee_id" class="form-control" value="{{ old('assignee_id', $prospect->assignee_id) }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Additional Details</label>
                    <textarea class="form-control" name="additional_details" rows="3">{{ old('additional_details', $prospect->additional_details) }}</textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update Prospect</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- Optional JS for adding/removing fields dynamically -->
<script>
function addBusinessAddress() {
    let container = document.getElementById('business-address-group');
    let div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <textarea name="business_address[]" class="form-control" rows="2" required></textarea>
        <button type="button" class="btn btn-danger ms-2" onclick="this.parentElement.remove()">-</button>
    `;
    container.insertBefore(div, container.lastElementChild);
}

function addLimitedCompany() {
    let container = document.getElementById('limited-company-group');
    let div = document.createElement('div');
    div.className = 'row mb-2 align-items-center';
    div.innerHTML = `
        <div class="col-md-3"><input type="text" name="limited_company[]" class="form-control" placeholder="Limited Company"></div>
        <div class="col-md-3"><input type="text" name="limited_company_number[]" class="form-control" placeholder="Limited Company Number"></div>
        <div class="col-md-3"><input type="text" name="charity[]" class="form-control" placeholder="Charity"></div>
        <div class="col-md-2"><input type="text" name="sole_trader[]" class="form-control" placeholder="Sole Trader"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button></div>
    `;
    container.insertBefore(div, container.lastElementChild);
}

function addCurrentSupplier() {
    let container = document.getElementById('current-supplier-group');
    let div = document.createElement('div');
    div.className = 'row mb-2 align-items-center';
    div.innerHTML = `
        <div class="col-md-3"><input type="text" name="current_supplier_gas[]" class="form-control" placeholder="Current Supplier (Gas)"></div>
        <div class="col-md-3"><input type="text" name="current_supplier_electricity[]" class="form-control" placeholder="Current Supplier (Electricity)"></div>
        <div class="col-md-3"><input type="date" name="contract_end_date_gas[]" class="form-control" placeholder="Contract End Date (Gas)"></div>
        <div class="col-md-2"><input type="date" name="contract_end_date_electricity[]" class="form-control" placeholder="Contract End Date (Electricity)"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button></div>
    `;
    container.insertBefore(div, container.lastElementChild);
}

function addMprn() {
    let container = document.getElementById('mprn-group');
    let div = document.createElement('div');
    div.className = 'row mb-2 align-items-center';
    div.innerHTML = `
        <div class="col-md-3"><input type="text" name="mprn_number[]" class="form-control" placeholder="MPRN Number"></div>
        <div class="col-md-3"><input type="text" name="mpan_number[]" class="form-control" placeholder="MPAN Number"></div>
        <div class="col-md-3"><input type="text" name="eac[]" class="form-control" placeholder="EAC"></div>
        <div class="col-md-2"><input type="text" name="aq[]" class="form-control" placeholder="AQ"></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button></div>
    `;
    container.insertBefore(div, container.lastElementChild);
}
</script>

@endsection
