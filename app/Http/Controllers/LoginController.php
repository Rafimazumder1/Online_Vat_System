<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginn(Request $request)
{
    // Validate the request
    $request->validate([
        'APPS_USER' => 'required|string',
        'USER_PASSWORD' => 'required|string',
    ]);

    // Retrieve credentials from the request
    $appsUser = $request->input('APPS_USER');
    $userPassword = $request->input('USER_PASSWORD');

    // Query the database for the user, including company name
    $userData = DB::select("
        SELECT u.*, c.COMPANY_NAME
        FROM ABC_USER u
        LEFT JOIN ABC_COMPANY c ON u.COMPANY_CODE = c.COMPANY_CODE
        WHERE u.APPS_USER = ?
    ", [$appsUser]);
    // dd($userData); // Uncomment this line to debug the query results

    // Check if user data is retrieved
    if (!empty($userData)) {
        // Convert the result to an array and ensure keys are uppercase
        $userArray = array_change_key_case((array)$userData[0], CASE_UPPER);

        // dd($userArray);
        // Check the password directly
        if ($userArray['USER_PASSWORD'] === $userPassword) {
            // Create a new User instance with the fetched data
            $user = new User([
                'APPS_USER' => $userArray['APPS_USER'],
                'USER_PASSWORD' => $userArray['USER_PASSWORD'],
                'USER_ROLE' => $userArray['USER_ROLE'], // Added USER_ROLE
                'USER_ID' => $userArray['USER_ID'], // Make sure to include other fields you need
                'COMPANY_CODE' => $userArray['COMPANY_CODE'],
                'COMPANY_NAME' => $userArray['COMPANY_NAME'] ?? null, // Fetch COMPANY_NAME
            ]);


            // Log in the user
            Auth::login($user);
            // dd($user);

            // Redirect to the dashboard with company name in the session
            session(['company_name' => $userArray['COMPANY_NAME'] ?? null]);

            // Redirect to the dashboard
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }
    }

    // User not found or credentials are invalid
    return back()->withErrors(['login_failed' => 'Invalid credentials']);
}




    public function logout(Request $request)
    {
        // Log the user out of the session
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation
        $request->session()->regenerateToken();

        // Redirect the user to the login page or any other page
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
