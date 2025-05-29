@extends('home')
@section('content')

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4 class="mb-4">Add New Prospect</h4>
        <form action="{{ route('prospects.store') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact_number" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email_address" class="form-control" required>
                </div>

                <!-- Cloneable Business Address -->
                <div class="col-md-12 my-5 mt-5">
                    <label class="mb-2 mt-5">Business Address (Multiple Sites)</label>
                    <div id="business-address-group">
                        <div class="input-group mb-2">
                            <textarea name="business_address[]" class="form-control" rows="2" required></textarea>
                            <button type="button" class="btn btn-success ms-2" onclick="addBusinessAddress()">+</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label>Home Address</label>
                    <textarea name="home_address" class="form-control" rows="2"></textarea>
                </div>

                <!-- Cloneable Limited Company Group -->
                <div class="col-md-12 my-5">
                    <label class="mb-2 mt-5">Limited Company / Charity / Sole Trader (Multiple Entities)</label>
                    <div id="limited-company-group">
                        <div class="row mb-2 align-items-center">
                            <div class="col-md-3">
                                <input type="text" name="limited_company[]" class="form-control" placeholder="Limited Company">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="limited_company_number[]" class="form-control" placeholder="Limited Company Number">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="charity[]" class="form-control" placeholder="Charity">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="sole_trader[]" class="form-control" placeholder="Sole Trader">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" onclick="addLimitedCompany()">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cloneable Current Supplier / Contract End Dates -->
                <div class="col-md-12 my-5">
                    <label class="mb-2 mt-5">Current Supplier and Contract End Dates (Multiple Contracts)</label>
                    <div id="current-supplier-group">
                        <div class="row mb-2 align-items-center">
                            <div class="col-md-3">
                                <input type="text" name="current_supplier_gas[]" class="form-control" placeholder="Current Supplier (Gas)">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="current_supplier_electricity[]" class="form-control" placeholder="Current Supplier (Electricity)">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="contract_end_date_gas[]" class="form-control" placeholder="Contract End Date (Gas)">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="contract_end_date_electricity[]" class="form-control" placeholder="Contract End Date (Electricity)">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" onclick="addCurrentSupplier()">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cloneable MPRN, MPAN, EAC, AQ -->
                <div class="col-md-12 my-5">
                    <label class="mb-2 my-5">MPRN, MPAN, EAC, AQ (Multiple Sites)</label>
                    <div id="mprn-group">
                        <div class="row mb-2 align-items-center">
                            <div class="col-md-3">
                                <input type="text" name="mprn_number[]" class="form-control" placeholder="MPRN Number">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="mpan_number[]" class="form-control" placeholder="MPAN Number">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="eac[]" class="form-control" placeholder="EAC">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="aq[]" class="form-control" placeholder="AQ">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" onclick="addMprn()">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other fields -->

                <div class="col-md-6 mb-3 mt-5">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" class="form-control">
                </div>

                <div class="col-md-6 mb-3 mt-5">
                    <label>Name on Card</label>
                    <input type="text" name="bank_account_name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Account Number</label>
                    <input type="text" name="account_number" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Sort Code</label>
                    <input type="text" name="sort_code" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Assignee</label>
                    <input type="text" name="assignee_id" class="form-control">
                </div>

                <div class="col-md-12 mb-4">
                    <label>Additional Details</label>
                    <textarea name="additional_details" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100">Save Prospect</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- JavaScript for cloning -->
<script>
    // Business Address
    function addBusinessAddress() {
        const group = document.getElementById('business-address-group');
        const newInput = document.createElement('div');
        newInput.classList.add('input-group', 'mb-2');
        newInput.innerHTML = `
            <textarea name="business_address[]" class="form-control" rows="2" required></textarea>
            <button type="button" class="btn btn-danger ms-2" onclick="this.parentElement.remove()">-</button>
        `;
        group.appendChild(newInput);
    }

    // Limited Company Group
    function addLimitedCompany() {
        const group = document.getElementById('limited-company-group');
        const newInput = document.createElement('div');
        newInput.classList.add('row', 'mb-2', 'align-items-center');
        newInput.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="limited_company[]" class="form-control" placeholder="Limited Company">
            </div>
            <div class="col-md-3">
                <input type="text" name="limited_company_number[]" class="form-control" placeholder="Limited Company Number">
            </div>
            <div class="col-md-3">
                <input type="text" name="charity[]" class="form-control" placeholder="Charity">
            </div>
            <div class="col-md-2">
                <input type="text" name="sole_trader[]" class="form-control" placeholder="Sole Trader">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
            </div>
        `;
        group.appendChild(newInput);
    }

    // Current Supplier Group
    function addCurrentSupplier() {
        const group = document.getElementById('current-supplier-group');
        const newInput = document.createElement('div');
        newInput.classList.add('row', 'mb-2', 'align-items-center');
        newInput.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="current_supplier_gas[]" class="form-control" placeholder="Current Supplier (Gas)">
            </div>
            <div class="col-md-3">
                <input type="text" name="current_supplier_electricity[]" class="form-control" placeholder="Current Supplier (Electricity)">
            </div>
            <div class="col-md-3">
                <input type="date" name="contract_end_date_gas[]" class="form-control" placeholder="Contract End Date (Gas)">
            </div>
            <div class="col-md-2">
                <input type="date" name="contract_end_date_electricity[]" class="form-control" placeholder="Contract End Date (Electricity)">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
            </div>
        `;
        group.appendChild(newInput);
    }

    // MPRN Group
    function addMprn() {
        const group = document.getElementById('mprn-group');
        const newInput = document.createElement('div');
        newInput.classList.add('row', 'mb-2', 'align-items-center');
        newInput.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="mprn_number[]" class="form-control" placeholder="MPRN Number">
            </div>
            <div class="col-md-3">
                <input type="text" name="mpan_number[]" class="form-control" placeholder="MPAN Number">
            </div>
            <div class="col-md-3">
                <input type="text" name="eac[]" class="form-control" placeholder="EAC">
            </div>
            <div class="col-md-2">
                <input type="text" name="aq[]" class="form-control" placeholder="AQ">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">-</button>
            </div>
        `;
        group.appendChild(newInput);
    }
</script>

@endsection
