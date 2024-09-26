<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        // dd($employees);

    //    $Employes = DB::table(table: 'HR_EMPLOYEE')->get();

        return view('setup.employe_info.index', compact(var_name: 'employees'));
    }


    public function create()
    {
        return view('setup.employe_info.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([

            'EMP_NAME' => 'required|string|max:255',
            'DATE_OF_BIRTH' => 'required|date',
            'GENDER' => 'required|string|max:10',
            'NATIONAL_ID' => 'nullable|string|max:20',
            'BLOOD_GROUP' => 'nullable|string|max:3',
            'PASPORT_NO' => 'nullable|string|max:20',
            'RELIGION' => 'nullable|string|max:50',
            'PRS_ADD' => 'required|string|max:500',
            'PRS_DISTRICT' => 'required|string|max:100',
            'PRS_THANA' => 'required|string|max:100',
            'PRS_PSTCODE' => 'nullable|string|max:10',
            'PRS_PHONE' => 'required|string|max:15',
            'PRM_ADD' => 'nullable|string|max:500',
            'PRM_DISTRICT' => 'nullable|string|max:100',
            'PRM_THANA' => 'nullable|string|max:100',
            'PRM_PSTCODE' => 'nullable|string|max:10',
            'PRM_PHONE' => 'nullable|string|max:15',
            'DEPT_CODE' => 'required|string|max:100',
            'DESIG_CODE' => 'required|string|max:100',
            'JOIN_DATE' => 'required|date',
            'BANK_CODE' => 'nullable|string|max:50',
            'BANK_NAME' => 'nullable|string|max:255',
            'BRANCH_CODE' => 'nullable|string|max:50',
            'BRANCH_NAME' => 'nullable|string|max:255', // Added validation for BRANCH_NAME
        ]);
        // dd( $request);

        $companyCode = Auth::user()->company_code;


        $lastEmpCode = DB::table('HR_EMPLOYEE')
        ->where('COMPANY_CODE', $companyCode)
        ->orderBy('emp_code', 'desc')
        ->pluck('emp_code')
        ->first();

    if ($lastEmpCode) {
        // Extract the numeric part and increment it
        $lastCodeNumber = (int) substr($lastEmpCode, -3);
        $newCodeNumber = str_pad($lastCodeNumber + 1, 3, '0', STR_PAD_LEFT);
        $newEmpCode = 'EMP-' . $newCodeNumber;
    } else {
        // If no record exists, start with EMP_001
        $newEmpCode = 'EMP_001';
    }


        // dd($companyCode);

        DB::table('HR_EMPLOYEE')->insert([

            'COMPANY_CODE' => $companyCode, // Provide a default or dynamic value
            'EMP_CODE' =>  $newEmpCode, // Provide default or dynamic value
            'EMP_NAME' => $request->input('EMP_NAME'),
            'DATE_OF_BIRTH' => $request->input('DATE_OF_BIRTH'),
            'GENDER' => $request->input('GENDER'),
            'NATIONAL_ID' => $request->input('NATIONAL_ID'),
            'BLOOD_GROUP' => $request->input('BLOOD_GROUP'),
            'PASPORT_NO' => $request->input('PASPORT_NO'),
            'RELIGION' => $request->input('RELIGION'),
            'PRS_ADD' => $request->input('PRS_ADD'),
            'PRS_DISTRICT' => $request->input('PRS_DISTRICT'),
            'PRS_THANA' => $request->input('PRS_THANA'),
            'PRS_PSTCODE' => $request->input('PRS_PSTCODE'),
            'PRS_PHONE' => $request->input('PRS_PHONE'),
            'PRM_ADD' => $request->input('PRM_ADD'),
            'PRM_DISTRICT' => $request->input('PRM_DISTRICT'),
            'PRM_THANA' => $request->input('PRM_THANA'),
            'PRM_PSTCODE' => $request->input('PRM_PSTCODE'),
            'PRM_PHONE' => $request->input('PRM_PHONE'),
            'DEPT_CODE' => $request->input('DEPT_CODE'),
            'DESIG_CODE' => $request->input('DESIG_CODE'),
            'JOIN_DATE' => $request->input('JOIN_DATE'),
            'BANK_CODE' => $request->input('BANK_CODE'),
            'BANK_NAME' => $request->input('BANK_NAME'),
            'BRANCH_NAME' => $request->input('BRANCH_NAME'),
            'BRANCH_CODE' => $request->input('BRANCH_CODE'),
            'ACC_NO' => $request->input('ACC_NO'),
            // Ensure this column exists in your database
        ]);

        return redirect()->route('employe.index')->with('success', 'Employee information saved successfully.');
    }


    public function edit($emp_code)
{
    // Fetch the employee data by EMP_CODE
    $employee = DB::table('HR_EMPLOYEE')->where('EMP_CODE', $emp_code)->first();

    // Check if the employee exists
    if (!$employee) {
        return redirect()->route('employe.index')->with('error', 'Employee not found.');
    }

    // Return the edit view with the employee data
    return view('setup.employe_info.edit', compact('employee'));
}

public function update(Request $request, $emp_code)
{
    // Validate the request data
    $request->validate([
        'EMP_NAME' => 'required|string|max:255',
        'DATE_OF_BIRTH' => 'required|date',
        'GENDER' => 'required|string|max:10',
        'NATIONAL_ID' => 'nullable|string|max:20',
        'BLOOD_GROUP' => 'nullable|string|max:3',
        'PASPORT_NO' => 'nullable|string|max:20',
        'RELIGION' => 'nullable|string|max:50',
        'PRS_ADD' => 'required|string|max:500',
        'PRS_DISTRICT' => 'required|string|max:100',
        'PRS_THANA' => 'required|string|max:100',
        'PRS_PSTCODE' => 'nullable|string|max:10',
        'PRS_PHONE' => 'required|string|max:15',
        'PRM_ADD' => 'nullable|string|max:500',
        'PRM_DISTRICT' => 'nullable|string|max:100',
        'PRM_THANA' => 'nullable|string|max:100',
        'PRM_PSTCODE' => 'nullable|string|max:10',
        'PRM_PHONE' => 'nullable|string|max:15',
        'DEPT_CODE' => 'required|string|max:100',
        'DESIG_CODE' => 'required|string|max:100',
        'JOIN_DATE' => 'required|date',
        'BANK_CODE' => 'nullable|string|max:50',
        'BANK_NAME' => 'nullable|string|max:255',
        'BRANCH_CODE' => 'nullable|string|max:50',
        'BRANCH_NAME' => 'nullable|string|max:255',
        'ACCOUNT_NO' => 'nullable|string|max:20', // Make sure this matches your database
    ]);

    // Update the employee data
    DB::table('HR_EMPLOYEE')
        ->where('EMP_CODE', $emp_code)
        ->update([
            'EMP_NAME' => $request->input('EMP_NAME'),
            'DATE_OF_BIRTH' => $request->input('DATE_OF_BIRTH'),
            'GENDER' => $request->input('GENDER'),
            'NATIONAL_ID' => $request->input('NATIONAL_ID'),
            'BLOOD_GROUP' => $request->input('BLOOD_GROUP'),
            'PASPORT_NO' => $request->input('PASPORT_NO'),
            'RELIGION' => $request->input('RELIGION'),
            'PRS_ADD' => $request->input('PRS_ADD'),
            'PRS_DISTRICT' => $request->input('PRS_DISTRICT'),
            'PRS_THANA' => $request->input('PRS_THANA'),
            'PRS_PSTCODE' => $request->input('PRS_PSTCODE'),
            'PRS_PHONE' => $request->input('PRS_PHONE'),
            'PRM_ADD' => $request->input('PRM_ADD'),
            'PRM_DISTRICT' => $request->input('PRM_DISTRICT'),
            'PRM_THANA' => $request->input('PRM_THANA'),
            'PRM_PSTCODE' => $request->input('PRM_PSTCODE'),
            'PRM_PHONE' => $request->input('PRM_PHONE'),
            'DEPT_CODE' => $request->input('DEPT_CODE'),
            'DESIG_CODE' => $request->input('DESIG_CODE'),
            'JOIN_DATE' => $request->input('JOIN_DATE'),
            'BANK_CODE' => $request->input('BANK_CODE'),
            'BANK_NAME' => $request->input('BANK_NAME'),
            'BRANCH_CODE' => $request->input('BRANCH_CODE'),
            'BRANCH_NAME' => $request->input('BRANCH_NAME'),
            'ACC_NO' => $request->input('ACCOUNT_NO'),
        ]);

    return redirect()->route('employe.index')->with('success', 'Employee information updated successfully.');
}


public function destroy($emp_code)
{
    // Validate the employee code
    if (empty($emp_code)) {
        return redirect()->route('employe.index')->with('error', 'Employee code is required.');
    }

    // Perform the deletion
    $deleted = DB::table('HR_EMPLOYEE')->where('EMP_CODE', $emp_code)->delete();

    // Check if the deletion was successful
    if ($deleted) {
        return redirect()->route('employe.index')->with('success', 'Employee record deleted successfully.');
    } else {
        return redirect()->route('employe.index')->with('error', 'Failed to delete employee record.');
    }


}

}
