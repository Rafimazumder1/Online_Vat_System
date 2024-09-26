@extends('layout.master')

@section('page-title', 'Edit Employee Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-muted">Edit Employee Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('employe.update', $employee->emp_code) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Since it's an update, we use PUT method -->

                    <!-- Personal Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Personal Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="empName" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="empName" name="EMP_NAME"
                                    value="{{ old('EMP_NAME', $employee->emp_name) }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="DATE_OF_BIRTH"
                                    value="{{ old('DATE_OF_BIRTH', $employee->date_of_birth) }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="GENDER" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('GENDER', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('GENDER', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('GENDER', $employee->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="nationalID" class="form-label">National ID</label>
                                <input type="text" class="form-control" id="nationalID" name="NATIONAL_ID"
                                    value="{{ old('NATIONAL_ID', $employee->national_id) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="bloodGroup" class="form-label">Blood Group</label>
                                <input type="text" class="form-control" id="bloodGroup" name="BLOOD_GROUP"
                                    value="{{ old('BLOOD_GROUP', $employee->blood_group) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="passportNo" class="form-label">Passport No</label>
                                <input type="text" class="form-control" id="passportNo" name="PASPORT_NO"
                                    value="{{ old('PASPORT_NO', $employee->pasport_no) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" id="religion" name="RELIGION"
                                    value="{{ old('RELIGION', $employee->religion) }}">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Address Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Address Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="prsAddress" class="form-label">Present Address</label>
                                <input type="text" class="form-control" id="prsAddress" name="PRS_ADD"
                                    value="{{ old('PRS_ADD', $employee->prs_add) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="prsDistrict" class="form-label">Present District</label>
                                <input type="text" class="form-control" id="prsDistrict" name="PRS_DISTRICT"
                                    value="{{ old('PRS_DISTRICT', $employee->prs_district) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="prsThana" class="form-label">Present Thana</label>
                                <input type="text" class="form-control" id="prsThana" name="PRS_THANA"
                                    value="{{ old('PRS_THANA', $employee->prs_thana) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="prsPostcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" id="prsPstcode" name="PRS_PSTCODE"
                                    value="{{ old('PRS_PSTCODE', $employee->prs_pstcode) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="prsPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="prsPhone" name="PRS_PHONE"
                                    value="{{ old('PRS_PHONE', $employee->prs_phone) }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="prmAddress" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" id="prmAddress" name="PRM_ADD"
                                    value="{{ old('PRM_ADD', $employee->prm_add) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="prmDistrict" class="form-label">Permanent District</label>
                                <input type="text" class="form-control" id="prmDistrict" name="PRM_DISTRICT"
                                    value="{{ old('PRM_DISTRICT', $employee->prm_district) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="prmThana" class="form-label">Permanent Thana</label>
                                <input type="text" class="form-control" id="prmThana" name="PRM_THANA"
                                    value="{{ old('PRM_THANA', $employee->prm_thana) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="prmPostcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" id="prmPostcode" name="PRM_PSTCODE"
                                    value="{{ old('PRM_PSTCODE', $employee->prm_pstcode) }}">
                            </div>
                            <div class="col-md-2">
                                <label for="prmPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="prmPhone" name="PRM_PHONE"
                                    value="{{ old('PRM_PHONE', $employee->prm_phone) }}">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Job Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Job Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="deptCode" class="form-label">Department Code</label>
                                <input type="text" class="form-control" id="deptCode" name="DEPT_CODE"
                                    value="{{ old('DEPT_CODE', $employee->dept_code) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="desigCode" class="form-label">Designation Code</label>
                                <input type="text" class="form-control" id="desigCode" name="DESIG_CODE"
                                    value="{{ old('DESIG_CODE', $employee->desig_code) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="joinDate" class="form-label">Join Date</label>
                                <input type="date" class="form-control" id="joinDate" name="JOIN_DATE"
                                    value="{{ old('JOIN_DATE', $employee->join_date) }}" required>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Bank Information Section -->
                    <fieldset class="border p-3 mb-3">
                        <legend class="float-none w-auto p-2">Bank Information</legend>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="bankCode" class="form-label">Bank Code</label>
                                <input type="text" class="form-control" id="bankCode" name="BANK_CODE"
                                    value="{{ old('BANK_CODE', $employee->bank_code) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="bankName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" name="BANK_NAME"
                                    value="{{ old('BANK_NAME', $employee->bank_name) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="branchCode" class="form-label">Branch Code</label>
                                <input type="text" class="form-control" id="branchCode" name="BRANCH_CODE"
                                    value="{{ old('BRANCH_CODE', $employee->branch_code) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="branchName" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="BRANCH_NAME"
                                    value="{{ old('BRANCH_NAME', $employee->branch_name) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="accountNo" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="accountNo" name="ACCOUNT_NO"
                                    value="{{ old('ACCOUNT_NO', $employee->acc_no) }}">
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Employee</button>
                        <a href="{{ route('employe.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
