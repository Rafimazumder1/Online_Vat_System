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
                            </div><div class="col-md-3">
                                <label for="accountName" class="form-label">Account No</label>
                                <input type="text" class="form-control" id="accNo" name="ACC_NO">
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






        <div class="container-fluid px-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <b style="color:cornflowerblue">Employees Information</b>
                    <a href="{{ route('com.create') }}" class="btn btn-primary">Add New Employee</a>
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
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Father's Name</th>
                                    <th>Mother's Name</th>
                                    <th>Present Village</th>
                                    <th>Present District</th>
                                    <th>Present Thana</th>
                                    <th>Present Post Office</th>
                                    <th>Present Postcode</th>
                                    <th>Present Address</th>
                                    <th>Present Phone</th>
                                    <th>Present Mobile</th>
                                    <th>Present Email</th>
                                    <th>Permanent Village</th>
                                    <th>Permanent District</th>
                                    <th>Permanent Thana</th>
                                    <th>Permanent Post Office</th>
                                    <th>Permanent Postcode</th>
                                    <th>Permanent Address</th>
                                    <th>Permanent Phone</th>
                                    <th>Date of Birth</th>
                                    <th>Age</th>
                                    <th>Marital Status</th>
                                    <th>Gender</th>
                                    <th>Religion</th>
                                    <th>Nationality</th>
                                    <th>National ID</th>
                                    <th>Identity Symbol</th>
                                    <th>Security ID</th>
                                    <th>Designation Allocation Code</th>
                                    <th>Job Division Code</th>
                                    <th>Department Code</th>
                                    <th>Section Code</th>
                                    <th>Designation Code</th>
                                    <th>Work Area Code</th>
                                    <th>Post Type</th>
                                    <th>Grade Code</th>
                                    <th>Grade Post</th>
                                    <th>Grade Payscale Code</th>
                                    <th>Grade Payscale</th>
                                    <th>Grade Timescale</th>
                                    <th>Pay Timescale</th>
                                    <th>TIN</th>
                                    <th>Account Number</th>
                                    <th>Bank Code</th>
                                    <th>Occupation Code</th>
                                    <th>Bank Name</th>
                                    <th>Branch Code</th>
                                    <th>Branch Name</th>
                                    <th>Type Code</th>
                                    <th>Employee Type</th>
                                    <th>Application Type</th>
                                    <th>Join Date</th>
                                    <th>Job Class Code</th>
                                    <th>Job Class Post</th>
                                    <th>Status</th>
                                    <th>Reporting Group</th>
                                    <th>Skill Level</th>
                                    <th>Shift</th>
                                    <th>Blood Group</th>
                                    <th>Medical Book ID</th>
                                    <th>Office Address</th>
                                    <th>Office Phone</th>
                                    <th>Office Mobile</th>
                                    <th>Office Fax</th>
                                    <th>Office Email</th>
                                    <th>Quarter Available</th>
                                    <th>Quarter Entitlement</th>
                                    <th>Application Quota</th>
                                    <th>Representative Designation</th>
                                    <th>PF Type</th>
                                    <th>Remarks</th>
                                    <th>Scout</th>
                                    <th>Singer</th>
                                    <th>Player</th>
                                    <th>Current Basic</th>
                                    <th>Bill Number</th>
                                    <th>GPF ID</th>
                                    <th>Payment Type</th>
                                    <th>Quarter Type</th>
                                    <th>OT Status</th>
                                    <th>OT Category</th>
                                    <th>Unit</th>
                                    <th>Driving License Number</th>
                                    <th>Passport Number</th>
                                    <th>Reference Name</th>
                                    <th>Reference Phone</th>
                                    <th>Reference Address</th>
                                    <th>Current Gross</th>
                                    <th>Location</th>
                                    <th>Application Flag</th>
                                    <th>Job Responsibility</th>
                                    <th>OT Rate</th>
                                    <th>Pre Bonus Status</th>
                                    <th>Late Status</th>
                                    <th>Early Leave Status</th>
                                    <th>Spouse Name</th>
                                    <th>Card Code</th>
                                    <th>Inactive Date</th>
                                    <th>Employee Image</th>
                                    <th>Employee Signature</th>
                                    <th>Employee Finger Print</th>
                                    <th>User ID</th>
                                    <th>Enter Date</th>
                                    <th>Last Update</th>
                                    <th>Last Update Date</th>
                                    <th>Present District Code</th>
                                    <th>Permanent District Code</th>
                                    <th>Present Thana Code</th>
                                    <th>Permanent Thana Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $key => $employee)
                                    <tr>
                                        <td>{{ $employee->company_code }}</td>
                                        <td>{{ $employee->emp_code }}</td>
                                        <td>{{ $employee->emp_name }}</td>
                                        <td>{{ $employee->fathers_name }}</td>
                                        <td>{{ $employee->mothers_name }}</td>
                                        <td>{{ $employee->prs_vill }}</td>
                                        <td>{{ $employee->prs_district }}</td>
                                        <td>{{ $employee->prs_thana }}</td>
                                        <td>{{ $employee->prs_pstofc }}</td>
                                        <td>{{ $employee->prs_pstcode }}</td>
                                        <td>{{ $employee->prs_add }}</td>
                                        <td>{{ $employee->prs_phone }}</td>
                                        <td>{{ $employee->prs_mobile }}</td>
                                        <td>{{ $employee->prs_email }}</td>
                                        <td>{{ $employee->prm_vill }}</td>
                                        <td>{{ $employee->prm_district }}</td>
                                        <td>{{ $employee->prm_thana }}</td>
                                        <td>{{ $employee->prm_pstofc }}</td>
                                        <td>{{ $employee->prm_pstcode }}</td>
                                        <td>{{ $employee->prm_add }}</td>
                                        <td>{{ $employee->prm_phone }}</td>
                                        <td>{{ $employee->date_of_birth }}</td>
                                        <td>{{ $employee->age }}</td>
                                        <td>{{ $employee->m_status }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->religion }}</td>
                                        <td>{{ $employee->nationality }}</td>
                                        <td>{{ $employee->national_id }}</td>
                                        <td>{{ $employee->identity_symbl }}</td>
                                        <td>{{ $employee->security_id }}</td>
                                        <td>{{ $employee->desig_alloc_code }}</td>
                                        <td>{{ $employee->jdiv_code }}</td>
                                        <td>{{ $employee->dept_code }}</td>
                                        <td>{{ $employee->sec_code }}</td>
                                        <td>{{ $employee->desig_code }}</td>
                                        <td>{{ $employee->work_area_code }}</td>
                                        <td>{{ $employee->post_type }}</td>
                                        <td>{{ $employee->grade_code }}</td>
                                        <td>{{ $employee->grade_post }}</td>
                                        <td>{{ $employee->grade_payscale_code }}</td>
                                        <td>{{ $employee->grade_payscale }}</td>
                                        <td>{{ $employee->grade_timescale }}</td>
                                        <td>{{ $employee->pay_timescale }}</td>
                                        <td>{{ $employee->tin }}</td>
                                        <td>{{ $employee->acc_no }}</td>
                                        <td>{{ $employee->bank_code }}</td>
                                        <td>{{ $employee->occu_code }}</td>
                                        <td>{{ $employee->bank_name }}</td>
                                        <td>{{ $employee->branch_code }}</td>
                                        <td>{{ $employee->branch_name }}</td>
                                        <td>{{ $employee->type_code }}</td>
                                        <td>{{ $employee->emp_type }}</td>
                                        <td>{{ $employee->app_type }}</td>
                                        <td>{{ $employee->join_date }}</td>
                                        <td>{{ $employee->jclass_code }}</td>
                                        <td>{{ $employee->jclass_post }}</td>
                                        <td>{{ $employee->status }}</td>
                                        <td>{{ $employee->reporting_group }}</td>
                                        <td>{{ $employee->skill_lvl }}</td>
                                        <td>{{ $employee->shift }}</td>
                                        <td>{{ $employee->blood_group }}</td>
                                        <td>{{ $employee->med_book_id }}</td>
                                        <td>{{ $employee->off_add }}</td>
                                        <td>{{ $employee->off_phone }}</td>
                                        <td>{{ $employee->off_mobile }}</td>
                                        <td>{{ $employee->off_fax }}</td>
                                        <td>{{ $employee->off_email }}</td>
                                        <td>{{ $employee->quarter_avail }}</td>
                                        <td>{{ $employee->quarter_entitle }}</td>
                                        <td>{{ $employee->app_quota }}</td>
                                        <td>{{ $employee->rep_designation }}</td>
                                        <td>{{ $employee->pf_type }}</td>
                                        <td>{{ $employee->remarks }}</td>
                                        <td>{{ $employee->scout }}</td>
                                        <td>{{ $employee->singer }}</td>
                                        <td>{{ $employee->player }}</td>
                                        <td>{{ $employee->curr_basic }}</td>
                                        <td>{{ $employee->bill_no }}</td>
                                        <td>{{ $employee->gpf_id }}</td>
                                        <td>{{ $employee->p_type }}</td>
                                        <td>{{ $employee->quarter_type }}</td>
                                        <td>{{ $employee->ot_status }}</td>
                                        <td>{{ $employee->ot_category }}</td>
                                        <td>{{ $employee->unit }}</td>
                                        <td>{{ $employee->driving_licno }}</td>
                                        <td>{{ $employee->pasport_no }}</td>
                                        <td>{{ $employee->ref_name }}</td>
                                        <td>{{ $employee->ref_phone }}</td>
                                        <td>{{ $employee->ref_add }}</td>
                                        <td>{{ $employee->curr_gross }}</td>
                                        <td>{{ $employee->location }}</td>
                                        <td>{{ $employee->app_flage }}</td>
                                        <td>{{ $employee->job_responsibility }}</td>
                                        <td>{{ $employee->ot_rate }}</td>
                                        <td>{{ $employee->pre_bonus_status }}</td>
                                        <td>{{ $employee->late_status }}</td>
                                        <td>{{ $employee->early_leave_status }}</td>
                                        <td>{{ $employee->spouse_name }}</td>
                                        <td>{{ $employee->card_code }}</td>
                                        <td>{{ $employee->inactive_date }}</td>
                                        <td>{{ $employee->emp_image }}</td>
                                        <td>{{ $employee->emp_signature }}</td>
                                        <td>{{ $employee->emp_finger_prnt }}</td>
                                        <td>{{ $employee->user_id }}</td>
                                        <td>{{ $employee->enter_date }}</td>
                                        <td>{{ $employee->last_update }}</td>
                                        <td>{{ $employee->last_update_date }}</td>
                                        <td>{{ $employee->prs_dist_code }}</td>
                                        <td>{{ $employee->prm_dist_code }}</td>
                                        <td>{{ $employee->prs_thana_code }}</td>
                                        <td>{{ $employee->prm_thana_code }}</td>
                                        <td>
                                            <a href="{{ route('employe.edit', $employee->emp_code) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('employe.destroy', $employee->emp_code) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
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
