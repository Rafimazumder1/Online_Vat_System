@extends('layout.master')

@section('page-title', 'Company Information')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <b style="color:cornflowerblue">Company Information</b>
        </div>
        <div class="card-body">
            <form action="{{ route('com.update', $company->company_code) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Ensure the form uses the PUT method for updates -->

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" value="{{ old('company_name', $company->company_name) }}" required>
                </div>

                <div class="form-group">
                    <label for="short_name">Short Name</label>
                    <input type="text" name="short_name" class="form-control" placeholder="Enter Short Name" value="{{ old('short_name', $company->short_form) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="company_type">Company Type</label>
                    <select class="form-control" id="company_type" name="company_type" required>
                        <option value="Limited Company" {{ old('company_type', $company->company_type) == 'Limited Company' ? 'selected' : '' }}>Limited Company</option>
                        <option value="Partnership" {{ old('company_type', $company->company_type) == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                        <option value="Public Company" {{ old('company_type', $company->company_type) == 'Public Company' ? 'selected' : '' }}>Public Company</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="business_activity">Business Activity</label>
                    <input type="text" name="business_activity" class="form-control" placeholder="Enter Business Activity" value="{{ old('business_activity', $company->business_activity) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="bin">BIN</label>
                    <input type="text" name="bin" class="form-control" placeholder="Enter BIN (Business Identification Number)" value="{{ old('bin', $company->bin) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="rep_currency">Representative Currency</label>
                    <select class="form-control" id="rep_currency" name="rep_currency" required>
                        <option value="BDT" {{ old('rep_currency', $company->rep_currency) == 'BDT' ? 'selected' : '' }}>BDT</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="logo">Current Logo</label><br>
                    @if ($company->logo)
                        <img src="{{ asset('storage/logos' . $company->logo) }}" alt="Company Logo" style="max-width: 200px; height: auto;"><br><br>
                    @else
                        <p>No logo available.</p>
                    @endif
                    <label for="logo">Upload New Logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                </div>

                <div class="form-group">
                    <label for="address">Company Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Company Address" required>{{ old('address', $company->company_add) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="reg_no">Registration Number</label>
                    <input type="text" name="reg_no" class="form-control" placeholder="Enter Registration Number" value="{{ old('reg_no', $company->reg_no) }}">
                </div>
                                                                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>       
</div>
@endsection
