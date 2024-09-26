<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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






    // public function loginn(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'APPS_USER' => 'required|string',
    //         'USER_PASSWORD' => 'required|string',
    //     ]);
    //     $user = user::where('APPS_USER', $request->APPS_USER)->first();
    //     // dd($user);
    //     // Fetch user from database
    //     $user = DB::table('ABC_USER')
    //               ->where('APPS_USER', $request->APPS_USER)
    //               ->first();

    //     // Debugging: Output the $user object
    //     // dd($user);

    //     // Ensure correct column name is used
    //     if ($user) {
    //         // Check the actual property names using dd()
    //         // dd($user);

    //         // If the column is actually 'user_password', use this name
    //         // auth attemp
    //         if ($user->user_password === $request->USER_PASSWORD) {

    //             Auth::login($user);
    //             return redirect()->route('dashboard')->with('success', 'Company updated successfully');
    //             // echo 'hlw';
    //         } else {
    //             return response()->json(['message' => 'Invalid credentials'], 401);
    //         }
    //     } else {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }
    // }

    public function loginn(Request $request)
    {
        // Validate the request
        $request->validate([
            'APPS_USER' => 'required|string',
            'USER_PASSWORD' => 'required|string',
        ]);

        // Retrieve credentials from request
        $appsUser = $request->input('APPS_USER');
        $userPassword = $request->input('USER_PASSWORD');

        // Query the database for the user
        $userData = DB::select("SELECT * FROM ABC_USER WHERE APPS_USER = ?", [$appsUser]);

        if (!empty($userData)) {
            // Convert the result to an array and ensure keys are uppercase
            $userArray = array_change_key_case((array)$userData[0], CASE_UPPER);

            // Check the password (assuming it's in plain text)
            if ($userArray['USER_PASSWORD'] === $userPassword) {
                // Create a new User instance with the fetched data
                $user = new User([
                    'APPS_USER' => $userArray['APPS_USER'],
                    'USER_PASSWORD' => $userArray['USER_PASSWORD'],
                    'COMPANY_CODE' => $userArray['COMPANY_CODE'],
                    // Add other user fields as needed
                ]);
                // dd( $user);

                // Log in the user by setting up the session manually
                Auth::login($user);

                // Redirect to the dashboard
                return redirect()->route('dashboard');
            }
        }

        // User not found or credentials are invalid
        return back()->withErrors(['login_failed' => 'Invalid credentials']);
    }


    // public function loginn(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'APPS_USER' => 'required|string',
    //         'USER_PASSWORD' => 'required|string',
    //     ]);

    //     // Retrieve credentials from request
    //     $appsUser = $request->input('APPS_USER');
    //     $userPassword = $request->input('USER_PASSWORD');

    //     // Query the database for the user
    //     $userData = DB::select("SELECT * FROM ABC_USER WHERE APPS_USER = ?", [
    //         $appsUser
    //     ]);

    //     if (!empty($userData)) {
    //         // Convert the result to an array and ensure keys are uppercase
    //         $userArray = array_change_key_case((array)$userData[0], CASE_UPPER);

    //         // Check the password (assuming it's in plain text)
    //         if ($userArray['USER_PASSWORD'] === $userPassword) {
    //             // Create a new User instance with the fetched data
    //             $user = new User([
    //                 'APPS_USER' => $userArray['APPS_USER'],
    //                 'USER_PASSWORD' => $userArray['USER_PASSWORD'],
    //                 'COMPANY_CODE' => $userArray['COMPANY_CODE'],
    //                 // Add other user fields as needed
    //             ]);

    //             // Log in the user by setting up the session manually
    //             Auth::login($user);

    //             // Redirect to the dashboard
    //             return redirect()->route('dashboard');
    //         }
    //     }

    //     // User not found or credentials are invalid
    //     return back()->withErrors(['login_failed' => 'Invalid credentials']);
    // }










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
