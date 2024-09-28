<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;


use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

  public function __construct()
{
    // Apply the 'auth' middleware only to specific methods
    $this->middleware('auth')->only(['createUser', 'showCreateUserForm']);
}






    public function showCreateUserForm()
    {
        $employees = Employee::all();

        $data = User::all();


        // dd( $user);

        return view('systemcon.user.create', compact('employees', 'data'));

    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'employee_id' => 'required|string|exists:HR_EMPLOYEE,EMP_CODE', // Ensure employee exists
            'roll' => 'required|string',
            'password' => 'required|string|min:3|confirmed', // Confirm password
        ]);


        try {
            // Retrieve the company code from the logged-in user
            $companyCode = Auth::user()->company_code;

            // Prepare data for insertion
            $userData = [
                'APPS_USER' => strtoupper($request->employee_id),
                'USER_ROLE' => $request->roll,
                'USER_PASSWORD' =>$request->password,
                'COMPANY_CODE' => $companyCode,
                'USER_STATUS' => 'A', // Set default status
            ];

            //  dd($userData);


            DB::table('ABC_USER')->insert($userData);

            // Redirect to the form with success message
            return redirect()->route(route: 'employe.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with the error message
            Log::error('Error inserting user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }











}

