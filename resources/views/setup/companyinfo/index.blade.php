
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













    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <b style="color:cornflowerblue">Company Information</b>
                <a href="{{ route('com.create') }}" class="btn btn-primary">Add New Company</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Company Code</th>
                                <th>Company Name</th>
                                <th>SHORT FORM</th>
                                <th>COMPANY TYPE</th>
                                <th>COMPANY ADDRESS</th>
                                <th>BIN</th>
                                <th>BUSINESS ACTIVITY</th>
                                <th>REGISTATION NO</th>
                                <th>CURRENCY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->company_code }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->short_form }}</td>
                                    <td>{{ $company->company_type }}</td>
                                    <td>{{ $company->company_add }}</td>
                                    <td>{{ $company->bin }}</td>
                                    <td>{{ $company->business_activity }}</td>
                                    <td>{{ $company->reg_no }}</td>
                                    <td>{{ $company->rep_currency }}</td>
                                    <td>
                                        <a href="{{ route('com.edit', $company->company_code) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('com.destroy', $company->company_code) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
