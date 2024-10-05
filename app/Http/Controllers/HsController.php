<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ChartOfAccount;
use Illuminate\Support\Facades\Log;
use App\Models\Hs;

class HsController extends Controller
{
    public function index()
    {
        $charts = ChartOfAccount::select('ACCODE', 'ACNAME')->get();


        //    dd($charts->toArray());
        // $charts = Hs::select('ACCODE', 'ACNAME')->get();
        // dd($charts->toArray());

        return view('setup.hs.index', compact('charts'));
    }

    public function store(Request $request)
    {
        // Validate the request to ensure ACNAME is provided

        // dd($request->all());

        // Validate the request to ensure ACNAME is provided
        $request->validate([
            'hs_code' => 'required|string|max:30',   // Add this to validate HS Code field
            'description' => 'required|string|max:300',  // Validate description with max length of 300
            'vds' => 'required|array',
            'vds.*' => 'in:Y,N',
            'exd' => 'required|array',
            'exd.*' => 'in:Y,N',                       // Validate each item in the exd array
        ]);
        // dd($request);

        // dd( $request);


        try {
            // Retrieve the logged-in user's company code
            $companyCode = Auth()->user()->company_code;

            // Determine the VDS_FLAG and EXD values based on the roll input
            $vds = $request->input('vds')[0];  // Get the first selected value (since it’s an array)
            $exd = $request->input('exd')[0];

            // Prepare the data to be inserted
            $data = [
                'COMPANY_CODE' => $companyCode,  // Logged-in user's company code
                'HS_CODE' => $request->input('hs_code'),
                'HS_DESC' => $request->input('description'),
                'VDS_FLAG' => $vds,
                'EXD' => $exd,
                'STATUS' => 'Active',  // Set default status
                'USER_ID' => auth()->user()->user_id ?? 'system',  // Set user or default 'system'
                'SCHEDULE_FLAG' => 'DEFAULT',  // Set default schedule flag
                'ENTER_DATE' => now(),  // Set current date for entry
            ];

            DB::table('HS_CODE_MT')->insert($data);

            $insertedRecord = DB::table('HS_CODE_MT')->where('HS_CODE', $request->input('hs_code'))->first();
            dd($insertedRecord);

            return redirect()->back()->with('success', 'HS Code added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving HS Code: ' . $e->getMessage());
        }
    }
}
