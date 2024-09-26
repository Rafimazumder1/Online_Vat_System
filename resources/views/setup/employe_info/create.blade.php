@extends('layout.master')

@section('page-title', 'Employee Information')



@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-muted">Employee Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('employe.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Personal Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Personal Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="empName" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="empName" name="EMP_NAME">
                            </div>
                            <div class="col-md-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="DATE_OF_BIRTH">
                            </div>
                            <div class="col-md-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="GENDER">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="nationalID" class="form-label">National ID</label>
                                <input type="text" class="form-control" id="nationalID" name="NATIONAL_ID">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="bloodGroup" class="form-label">Blood Group</label>
                                <input type="text" class="form-control" id="bloodGroup" name="BLOOD_GROUP">
                            </div>
                            <div class="col-md-3">
                                <label for="passportNo" class="form-label">Passport No</label>
                                <input type="text" class="form-control" id="passportNo" name="PASPORT_NO">
                            </div>
                            <div class="col-md-3">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" id="religion" name="RELIGION">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Address Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="prsAddress" class="form-label">Present Address</label>
                                <input type="text" class="form-control" id="prsAddress" name="PRS_ADD">
                            </div>
                            <div class="col-md-2">
                                <label for="prsDistrict" class="form-label">Present District</label>
                                <input type="text" class="form-control" id="prsDistrict" name="PRS_DISTRICT">
                            </div>
                            <div class="col-md-2">
                                <label for="prsThana" class="form-label">Present Thana</label>
                                <input type="text" class="form-control" id="prsThana" name="PRS_THANA">
                            </div>
                            <div class="col-md-2">
                                <label for="prsPostCode" class="form-label">Present Postcode</label>
                                <input type="text" class="form-control" id="prsPostCode" name="PRS_PSTCODE">
                            </div>
                            <div class="col-md-2">
                                <label for="prsPhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="prsPhone" name="PRS_PHONE">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="prmAddress" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" id="prmAddress" name="PRM_ADD">
                            </div>
                            <div class="col-md-2">
                                <label for="prmDistrict" class="form-label">Permanent District</label>
                                <input type="text" class="form-control" id="prmDistrict" name="PRM_DISTRICT">
                            </div>
                            <div class="col-md-2">
                                <label for="prmThana" class="form-label">Permanent Thana</label>
                                <input type="text" class="form-control" id="prmThana" name="PRM_THANA">
                            </div>
                            <div class="col-md-2">
                                <label for="prmPostCode" class="form-label">Permanent Postcode</label>
                                <input type="text" class="form-control" id="prmPostCode" name="PRM_PSTCODE">
                            </div>
                            <div class="col-md-2">
                                <label for="prmPhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="prmPhone" name="PRM_PHONE">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Employment Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Employment Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="deptCode" class="form-label">Department</label>
                                <input type="text" class="form-control" id="deptCode" name="DEPT_CODE">
                            </div>
                            <div class="col-md-4">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designation" name="DESIG_CODE">
                            </div>
                            <div class="col-md-4">
                                <label for="joinDate" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="joinDate" name="JOIN_DATE">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Bank Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2 ">Bank Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="bankCode" class="form-label">Bank Code</label>
                                <input type="text" class="form-control" id="bankCode" name="BANK_CODE">
                            </div>
                            <div class="col-md-3">
                                <label for="bankName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" name="BANK_NAME">
                            </div>
                            <div class="col-md-3">
                                <label for="branchCode" class="form-label">Branch Code</label>
                                <input type="text" class="form-control" id="branchCode" name="BRANCH_CODE">
                            </div>
                            <div class="col-md-3">
                                <label for="branchName" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="BRANCH_NAME">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
