

@extends('layout.master')

@section('page-title', 'Company Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">
                <b style="color:cornflowerblue">Client & Supplier Information</b>
            </div>
            <div class="card-body">
                <form action="{{ route('c&s.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="card">
                            <div class="card-body" style="border: 2px solid;">


                                <div class="form-body">
                                    <div class="row">
                                        <!-- ------1st div start----- -->
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="form-group row">
                                                            <label for="drcr_code"
                                                                class="col-sm-4 col-form-label text-center font-weight-bold">Code
                                                                no</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="drcr_code"
                                                                    id="drcr_code" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="form-group row">
                                                            <label for="short_name"
                                                                class="col-sm-6 col-form-label text-center font-weight-bold">Short
                                                                Name</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" name="short_name"
                                                                    id="short_name" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="drcr_name"
                                                                    class="text-center font-weight-bold">Name</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="drcr_name"
                                                                    id="drcr_name" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="road_no"
                                                                    class="text-center font-weight-bold">Road No</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="road_no"
                                                                    id="road_no" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="house_no"
                                                                    class="text-center font-weight-bold">House No</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="house_no"
                                                                    id="house_no" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="area"
                                                                    class="text-center font-weight-bold">Area</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="area"
                                                                    id="area" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="form-group row">
                                                            <label for="city"
                                                                class="col-sm-4 col-form-label text-left font-weight-bold">City</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="city"
                                                                    id="city" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="form-group row">
                                                            <label for="post_code"
                                                                class="col-sm-5 col-form-label text-center font-weight-bold">Post
                                                                Code</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" name="address"
                                                                    id="address" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="country"
                                                                    class="text-center font-weight-bold">Country</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="address"
                                                                    id="address" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="lan_no1"
                                                                    class="text-center font-weight-bold">Lan No1</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control" name="lan_no1"
                                                                    id="lan_no1" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 col-md-3">
                                                                <label for="web_address"
                                                                    class="text-center font-weight-bold">Web
                                                                    Address</label>
                                                            </div>
                                                            <div class="col-sm-12 col-md-9">
                                                                <input type="text" class="form-control"
                                                                    name="web_address" id="web_address" placeholder=""
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-3">
                                                        <label for="vat_reg_type" class="font-weight-bold">Vat Reg
                                                            Type</label>
                                                    </div>
                                                    <div class="col-sm-12 col-md-9">
                                                        <select class="form-select" name="vat_reg_type"
                                                            id="vat_reg_type">
                                                            <option value="">UNREGISTER</option>
                                                            <option value="">UNREGISTER2</option>
                                                            <!-- Add more options here -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ------1st div end----- -->

                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                                        <!-- ------2nd div start----- -->
                                        <!-- ------2nd div start----- -->
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <!-- Business Nature -->
                                            <div class="form-group row">
                                                <label for="drcr_code"
                                                    class="col-sm-4 col-form-label text-left font-weight-bold">Business
                                                    Nature</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="business_nature"
                                                        id="business_nature" placeholder="" value="">
                                                </div>
                                            </div>

                                            <!-- Business Group and Type -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="business_group"
                                                            class="col-sm-12 col-form-label font-weight-bold">Business
                                                            Group</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" name="group_type" id="group_type">
                                                                <option value="">Select Organization</option>
                                                                <option value="Organization1">Organization 1</option>
                                                                <option value="Organization2">Organization 2</option>
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="type"
                                                            class="col-sm-12 col-form-label font-weight-bold">Type</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" name="type" id="type">
                                                                <option value="">Client</option>
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Transaction Nature and Status -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="transaction_nature"
                                                            class="col-sm-12 col-form-label font-weight-bold">Transaction
                                                            Nature</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" name="trans_currency"
                                                                id="trans_currency">
                                                                <option value="">Debtors</option>
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="status"
                                                            class="col-sm-12 col-form-label font-weight-bold">Status</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" name="status" id="status">
                                                                <option value="">Active</option>
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Cell No and Lan No -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="cell_no1"
                                                            class="col-sm-5 col-form-label text-left font-weight-bold">Cell
                                                            No 1</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="cell_no1"
                                                                id="cell_no1" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="lan_no2"
                                                            class="col-sm-4 col-form-label text-center font-weight-bold">Lan
                                                            No 2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="lan_no2"
                                                                id="lan_no2" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Cell No 2 and Ref ID -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="cell_no2"
                                                            class="col-sm-5 col-form-label text-left font-weight-bold">Cell
                                                            No 2</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="cell_no2"
                                                                id="cell_no2" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="ref_id"
                                                            class="col-sm-4 col-form-label text-left font-weight-bold">Ref
                                                            ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="ref_id"
                                                                id="ref_id" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Currency -->
                                            <div class="form-group row">
                                                <label for="currency"
                                                    class="col-sm-3 col-form-label font-weight-bold">Currency</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="currency" id="currency">
                                                        <option value="">BDT</option>
                                                        <!-- Add more options as needed -->
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Email ID 1 and 2 -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="email_id1"
                                                            class="col-sm-5 col-form-label text-left font-weight-bold">Email
                                                            ID 1</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="email_id1"
                                                                id="email_id1" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="email_id2"
                                                            class="col-sm-4 col-form-label text-left font-weight-bold">Email
                                                            ID 2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="email_id2"
                                                                id="email_id2" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- NID and BIN -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="nid"
                                                            class="col-sm-5 col-form-label text-left font-weight-bold">NID</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="nid"
                                                                id="nid" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="bin"
                                                            class="col-sm-4 col-form-label text-left font-weight-bold">BIN</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="bin"
                                                                id="bin" placeholder="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ------2nd div end----- -->



                                        <div class="card">
                                            <div class="card-body" style="border: 2px solid;">
                                                <div class="row">
                                                    <!-- Control Code Section -->
                                                    <div class="col-md-5 col-sm-5 col-lg-5">
                                                        <h6 class="section-header">Control Code</h6>
                                                        <div class="form-group row">
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    name="control_code_1" id="control_code_1"
                                                                    placeholder="" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    name="control_code_2" id="control_code_2"
                                                                    placeholder="" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    name="control_code_3" id="control_code_3"
                                                                    placeholder="" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Control Head Section -->
                                                    <div class="col-md-7 col-sm-7 col-lg-7">
                                                        <h6 class="section-header">Control Head</h6>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="header_1" id="header_1"
                                                                    placeholder="Account Receivable" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="header_2" id="header_2" placeholder=""
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="header_3" id="header_3" placeholder=""
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </form>
                <button type="submit" class="btn btn-primary" style="">Submit</button>










    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <b style="color:cornflowerblue">Company Information</b>
                <a href="{{ route('c&s.create') }}" class="btn btn-primary">Add New Company</a>
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
                                <th>DRCR Code</th>
                                <th>DRCR Name</th>
                                <th>Short Name</th>
                                <th>DRCR Flag</th>
                                <th>Business Nature</th>
                                <th>Contact Person</th>
                                <th>Group Type</th>
                                <th>Control Flag</th>
                                <th>Status</th>
                                <th>Reference Code</th>
                                <th>Future One</th>
                                <th>Future Two</th>
                                <th>Future Three</th>
                                <th>User ID</th>
                                <th>Future Four</th>
                                <th>Future Five</th>
                                <th>NID</th>
                                <th>VAT Reg Type</th>
                                <th>Trans Currency</th>
                                <th>BIN</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->company_code }}</td>
                                    <td>{{ $company->drcr_code }}</td>
                                    <td>{{ $company->drcr_name }}</td>
                                    <td>{{ $company->short_name }}</td>
                                    <td>{{ $company->drcr_flag }}</td>
                                    <td>{{ $company->business_nature}}</td>
                                    <td>{{ $company->contact_person }}</td>
                                    <td>{{ $company->group_type }}</td>
                                    <td>{{ $company->ctrl_flag }}</td>
                                    <td>{{ $company->drcr_status }}</td>
                                    <td>{{ $company->ref_drcr_code }}</td>
                                    <td>{{ $company->future_one }}</td>
                                    <td>{{ $company->future_two }}</td>
                                    <td>{{ $company->future_three }}</td>
                                    <td>{{ $company->user_id }}</td>
                                    <td>{{ $company->future_four }}</td>
                                    <td>{{ $company->future_five }}</td>
                                    <td>{{ $company->nid }}</td>
                                    <td>{{ $company->vat_reg_type }}</td>
                                    <td>{{ $company->trans_currency }}</td>
                                    <td>{{ $company->bin }}</td>
                                    <td>
                                        <a href="{{ route('c&s.edit', $company->company_code) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('c&s.destroy', $company->company_code) }}" method="POST" style="display:inline-block;">
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
