@extends('layout.master')

@section('page-title', 'Company Information')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <b style="color:cornflowerblue">Company Information</b>
        </div>
        <div class="card-body">
            <form action="{{ route('com.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
                </div>

                <div class="form-group">
                    <label for="short_name">Short Name</label>
                    <input type="text" name="short_name" class="form-control" placeholder="Enter Short Name" required>
                </div>

                <div class="form-group">
                    <label for="company_type">Company Type</label>
                    <select class="form-control" id="company_type" name="company_type" required>
                        <option value="Limited Company">Limited Company</option>
                        <option value="Partnership">Partnership</option>
                        <option value="Public Company">Public Company</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="business_activity">Business Activity</label>
                    <input type="text" name="business_activity" class="form-control" placeholder="Enter Business Activity" required>
                </div>

                <div class="form-group">
                    <label for="bin">BIN</label>
                    <input type="text" name="bin" class="form-control" placeholder="Enter BIN (Business Identification Number)" required>
                </div>

                <div class="form-group">
                    <label for="rep_currency">Representative Currency</label>
                    <select class="form-control" id="rep_currency" name="rep_currency" required>
                        <option value="BDT">BDT</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="logo">Company Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="vat_registration_date">VAT Registration Date</label>
                    <input type="date" name="vat_registration_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Company Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Company Address" required></textarea>
                </div>

                <div class="form-group">
                    <label for="reg_no">Registration Number</label>
                    <input type="text" name="reg_no" class="form-control" placeholder="Enter Registration Number">
                </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

