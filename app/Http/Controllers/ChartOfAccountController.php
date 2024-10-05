<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Support\Facades\Log;


use App\Models\Employee;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ChartOfAccountController extends Controller
{
    //

    public function index()
    {
        $charts = ChartOfAccount::select('ACCODE', 'ACNAME')->get();
        // dd($charts->toArray());

        return view('setup.chartofaccount.index', compact('charts'));


    }

    public function store(Request $request)
    {
        // Validate the request to ensure ACNAME is provided

        // dd($request->all());

    // Validate the request to ensure ACNAME is provided
    $request->validate([
        'acname' => 'required|string|max:50',

    ]);
    // dd( $request);






        // Insert using the DB facade
        DB::table('ACT_COA')->insert([
        'ACNAME' => $request->acname,
        'GLLEVEL' => '1',              // Hardcoded value
        'POSTTYPE' => 'A',             // Hardcoded value
        'DRCR' => 'D',                 // Hardcoded value
        'STATUS' => 'A',               // Hardcoded value
        'FLAG' => 'Y',                 // Hardcoded value
        'LEGACY_CODE' => 'LC123',      // Hardcoded value
        'APL_CONTROL' => 'AC',         // Hardcoded value
        'SUB_CODE_ENABLE' => 'N',      // Hardcoded value
        'USER_ID' => Auth::user()->user_id ?? null, // Assuming you have a logged-in user
        'ENTER_DATE' => now(),
        'LAST_UPDATE' => null,
        'LAST_UPDATE_DATE' => null,
        ]);

        // dd( $request);

        return redirect()->route('create.chart.form')->with('success', 'Account created successfully.');
    }



    public function edit($id)
    {
        $chart = ChartOfAccount::findOrFail($id);
        return view('setup.chartofaccount.edit', compact('chart')); // Create a separate view for editing
    }


    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'acname' => 'required|string|max:50',
        ]);

        try {
            // Update the record using the DB facade
            $updated = DB::table('ACT_COA')->where('ACCODE', $id)->update([
                'ACNAME' => $request->acname,
                'LAST_UPDATE' => now(),
            ]);

            if ($updated) {
                return redirect()->route('create.chart.form')->with('success', 'Account updated successfully.');
            } else {
                return redirect()->route('create.chart.form')->with('error', 'No changes were made.');
            }
        } catch (\Exception $e) {
            return redirect()->route('create.chart.form')->with('error', 'Error updating account: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        // Check if the chart exists
        $chart = DB::table('ACT_COA')->where('ACCODE', $id)->first();
        // dd($chart);
        if (!$chart) {
            return redirect()->route('create.chart.form')->with('error', 'Account not found.');
        }

        // Delete the chart of account
        DB::table('ACT_COA')->where('ACCODE', $id)->delete();

        return redirect()->route('create.chart.form')->with('success', 'Account deleted successfully.');
    }



}
