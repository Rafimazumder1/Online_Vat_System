<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;


use App\Models\Employee;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DesignationController extends Controller
{
    public function index()
    {

        $employees = Employee::all();
        $designations = Designation::all();
        $data = User::all();

        return view('systemcon.designation.create', compact('employees', 'designations', 'data'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'roll' => 'required|in:active,inactive',
        ]);
        // dd($request->all());

        $status = $request->input('roll') === 'active' ? 'A' : 'I';
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.'])->withInput();
        }

        // Use DB facade to insert data into the DESIGNATION table
        DB::table('DESIGNATION')->insert([
            'DESIG_NAME' => $request->input('designation'),
            'STATUS' => $status,
            'USER_ID' => Auth::user()->user_id, // Associate with the logged-in user
            'ENTER_DATE' => now(),          // Current timestamp for entry date
            'LAST_UPDATE' => Auth::user()->id, // The user making the update
            'LAST_UPDATE_DATE' => now(),    // The time of the last update
        ]);


        // Redirect back with success message
        return redirect()->back()->with('success', 'Designation created successfully.');
    }



    public function edit($desig_code)
    {
        // Fetch the designation to be edited
        $designation = DB::table('DESIGNATION')->where('DESIG_CODE', $desig_code)->first();

        if (!$designation) {
            return redirect()->back()->with('error', 'Designation not found.');
        }

        // Fetch employees and users for the view (if needed)
        $employees = Employee::all();
        $data = User::all();

        return view('systemcon.designation.edit', compact('designation', 'employees', 'data'));
    }

    public function update(Request $request, $desig_code)
    {
        // Validate the incoming request
        $request->validate([
            'designation' => 'required|string|max:255',
            'roll' => 'required|in:active,inactive',
        ]);

        // Determine status
        $status = $request->input('roll') === 'active' ? 'A' : 'I';

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Update the designation using the DB facade
            DB::table('DESIGNATION')->where('DESIG_CODE', $desig_code)->update([
                'DESIG_NAME' => $request->input('designation'),
                'STATUS' => $status,
                'LAST_UPDATE' => Auth::user()->id, // The user making the update
                'LAST_UPDATE_DATE' => now(), // The time of the last update
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('designation.edit', $desig_code)->with('success', 'Designation updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();

            // Log the error for debugging purposes (optional)
            Log::error('Error updating designation: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error updating designation: ' . $e->getMessage());
        }
    }












    public function destroy($desig_code)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Check if the designation exists
            $designation = DB::table('DESIGNATION')->where('DESIG_CODE', $desig_code)->first();

            if (!$designation) {
                return redirect()->back()->with('error', 'Designation not found.');
            }

            // Delete the designation using the DB facade
            DB::table('DESIGNATION')->where('DESIG_CODE', $desig_code)->delete();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->back()->with('success', 'Designation deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();

            // Log the error for debugging purposes (optional)
            Log::error('Error deleting designation: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error deleting designation: ' . $e->getMessage());
        }
    }




}


