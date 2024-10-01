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
        $designations = Designation::all();

        $data = User::all();
        $roles = Designation::where('STATUS', 'A')->get();


        // dd($roles);


        // dd( $user);

        return view('systemcon.user.create', compact('employees', 'data','roles','designations'));

    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'employee_id' => 'required|string|exists:HR_EMPLOYEE,EMP_CODE', // Ensure employee exists
            'role' => 'required|exists:DESIGNATION,DESIG_CODE', // Validate the role (DESIG_CODE)
            'password' => 'required|string|min:3|confirmed', // Confirm password
        ]);
        //   dd($request->all());


        try {
            // Retrieve the company code from the logged-in user
            $companyCode = Auth::user()->company_code;

            $designation = DB::table('DESIGNATION')
            ->where('DESIG_CODE', $request->role)
            ->first();

            // Prepare data for insertion
            $userData = [
                'APPS_USER' => strtoupper($request->employee_id),
                'USER_ROLE' => $designation->desig_name,
                'USER_PASSWORD' =>$request->password,
                'COMPANY_CODE' => $companyCode,
                'USER_STATUS' => 'A', // Set default status
            ];

            //  dd($userData);


            DB::table('ABC_USER')->insert($userData);

            // Redirect to the form with success message
            return redirect()->route(route: 'create.user.form')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect back with the error message
            Log::error('Error inserting user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }


    public function edit($apps_user)
    {
        $user = User::findOrFail($apps_user);
        $roles = designation::where('STATUS', 'A')->get();
        // dd($roles);

        return view('systemcon.user.edit', compact('user', 'roles'));
    }

    // Update user
    public function update(Request $request, $apps_user)
    {
        $request->validate([
            'employee_id' => 'required|string|exists:HR_EMPLOYEE,EMP_CODE',
            'roll' => 'required|integer|exists:DESIGNATION,DESIG_CODE',
            'password' => 'nullable|string|min:3|confirmed',
        ]);

        try {
            $user = User::findOrFail($apps_user);

            $user->APPS_USER = strtoupper($request->employee_id);
            $user->USER_ROLE = $request->roll;
            if ($request->password) {
                $user->USER_PASSWORD = Hash::make($request->password);
            }
            $user->ROLE_ID = $request->roll;
            $user->save();

            return redirect()->route(route: 'create.user.form')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }

    // Delete user
    public function destroy($apps_user)
    {
        try {
            User::where('APPS_USER', $apps_user)->delete();
            return redirect()->route('create.user.form')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the user: ' . $e->getMessage());
        }
    }
}












