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

        $data = User::all();
        $roles = Designation::where('STATUS', 'A')->get();

        // dd($roles);


        // dd( $user);

        return view('systemcon.designation.create', compact('employees', 'data','roles'));

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
}


