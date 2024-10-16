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


    // public function store(Request $request)
    // {
    //     // Validate the request to ensure required fields are provided
    //     $request->validate([
    //         'hs_code' => 'required|string|max:30',   // Validate HS Code field
    //         'description' => 'required|string|max:300',  // Validate description
    //         'vds' => 'required|array',
    //         'vds.*' => 'in:Y,N',
    //         'exd' => 'required|array',
    //         'exd.*' => 'in:Y,N',                       // Validate each item in the exd array
    //         'charge_description.*' => 'required|string', // Charge description must be a string
    //         'cost_type.*' => 'required|in:P,F', // Cost Type must be either 'P' (Percentage) or 'F' (Fixed)
    //         'rate.*' => 'required|numeric|min:0', // Rate must be a numeric value
    //         'control_head.*' => 'required|string',
    //     ]);

    //     try {
    //         // Retrieve the logged-in user's company code
    //         $companyCode = Auth()->user()->company_code;

    //         // Determine the VDS_FLAG and EXD values based on the roll input
    //         $vds = $request->input('vds')[0];  // Get the first selected value (since it’s an array)
    //         $exd = $request->input('exd')[0];

    //         // Prepare the data to be inserted into HS_CODE_MT table
    //         $data = [
    //             'COMPANY_CODE' => $companyCode,  // Logged-in user's company code
    //             'HS_CODE' => $request->input('hs_code'),
    //             'HS_DESC' => $request->input('description'),
    //             'VDS_FLAG' => $vds,
    //             'EXD' => $exd,
    //             'STATUS' => 'Active',  // Set default status
    //             'USER_ID' => auth()->user()->user_id ?? 'system',  // Set user or default 'system'
    //             'SCHEDULE_FLAG' => 'DEFAULT',  // Set default schedule flag
    //             'ENTER_DATE' => now(),  // Set current date for entry
    //         ];

    //         // Insert into HS_CODE_MT table
    //         DB::table('HS_CODE_MT')->insert($data);
    //         // dd('Inserted into HS_CODE_MT successfully'); // Debugging to check the insert was successful

    //         // Hs_code_DT table data
    //         $userId = auth()->user()->user_id ?? 'system'; // Ensure USER_ID is defined correctly

    //         foreach ($request->charge_description as $key => $value) {
    //             $dtdata = [
    //                 'COMPANY_CODE' => $companyCode,
    //                 'HS_CODE' => $request->hs_code,
    //                 'SL_NO' => $key + 1, // Serial number for each row
    //                 'CONTROL_CODE' => $request->control_head[$key],
    //                 'COST_TYPE' => $request->cost_type[$key],
    //                 'RATE' => $request->rate[$key],
    //                 'USER_ID' => $userId, // Ensure USER_ID is correctly assigned
    //                 'ENTER_DATE' => now(),
    //             ];

    //             // Debugging to inspect the data before insertion
    //             // dd($hs_code_dt_data); // Remove this if you want to continue processing

    //             // Uncomment the following line to insert into the HS_CODE_DT table after debugging
    //             DB::table('HS_CODE_DT')->insert($dtdata);
    //             dd('Inserted into HS_CODE_MT successfully');
    //         }

    //         // If everything is successful, you can redirect or return a success response
    //         return redirect()->route('your.route.name')->with('success', 'Data inserted successfully!');

    //     } catch (\Exception $e) {
    //         // Handle any exceptions that occur
    //         return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    //     }
    // }
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    // public function store(Request $request)
    // {
    //     // Validate the request to ensure required fields are provided
    //     $request->validate([
    //         'hs_code' => 'required|string|max:30', // Validate HS Code field
    //     'description' => 'required|string|max:300', // Validate description
    //     'vds' => 'required|array',
    //     'vds.*' => 'in:Y,N',
    //     'exd' => 'required|array',
    //     'exd.*' => 'in:Y,N', // Validate each item in the exd array
    //     'charge_description' => 'required|array', // Ensure this is an array
    //     'charge_description.*' => 'required|string', // Each charge description must be a string
    //     'cost_type' => 'required|array',
    //     'cost_type.*' => 'required|in:P,F', // Cost Type must be either 'P' (Percentage) or 'F' (Fixed)
    //     'rate' => 'required|array',
    //     'rate.*' => 'required|numeric|min:0', // Rate must be a numeric value
    //     'control_head' => 'required|array',
    //     'control_head.*' => 'required|string',

    //     ]);
    //     //  dd( $request);

    //     try {
    //         // Retrieve the logged-in user's company code
    //         $companyCode = Auth()->user()->company_code;

    //         // Determine the VDS_FLAG and EXD values based on the roll input
    //         $vds = $request->input('vds')[0];  // Get the first selected value (since it’s an array)
    //         $exd = $request->input('exd')[0];

    //         // Prepare the data to be inserted into HS_CODE_MT table
    //         $data = [
    //             'COMPANY_CODE' => $companyCode,  // Logged-in user's company code
    //             'HS_CODE' => $request->input('hs_code'),
    //             'HS_DESC' => $request->input('description'),
    //             'VDS_FLAG' => $vds,
    //             'EXD' => $exd,
    //             'STATUS' => 'Active',  // Set default status
    //             'USER_ID' => auth()->user()->user_id ?? 'system',  // Set user or default 'system'
    //             'SCHEDULE_FLAG' => 'DEFAULT',  // Set default schedule flag
    //             'ENTER_DATE' => now(),  // Set current date for entry
    //         ];
    //         // dd( $data);

    //         // Insert into HS_CODE_MT table
    //         DB::table('HS_CODE_MT')->insert($data);
    //         // Uncomment to debug successful insert
    //         // dd('Inserted into HS_CODE_MT successfully');

    //         // Hs_code_DT table data
    //         $userId = auth()->user()->user_id ?? 'system'; // Ensure USER_ID is defined correctly

    //         foreach ($request->charge_description as $key => $value) {
    //             $dtdata = [
    //                 'COMPANY_CODE' => $companyCode,
    //                 'HS_CODE' => $request->hs_code,
    //                 'SL_NO' => $value, // Serial number for each row
    //                 'CONTROL_CODE' => $request->control_head[$key],
    //                 'COST_TYPE' => $request->cost_type[$key],
    //                 'RATE' => $request->rate[$key],
    //                 'USER_ID' => $userId, // Ensure USER_ID is correctly assigned
    //                 'ENTER_DATE' => now(),
    //             ];
    //             dd( $dtdata);


    //             DB::table('HS_CODE_DT')->insert($dtdata);

    //             // Insert into the HS_CODE_DT_060421 table
    //             try {
    //                 DB::table('HS_CODE_DT')->insert($dtdata);
    //                 dd('Inserted into HS_CODE_MT successfully');
    //             } catch (\Exception $e) {
    //                 // Log the error message or return an error response
    //                 // \Log::error('Error inserting into HS_CODE_DT: ' . $e->getMessage());
    //                 return response()->json(['error' => 'Failed to insert charge descriptions.'], 500);
    //             }
    //         }

    //         return response()->json(['success' => 'Data inserted successfully.'], 200);

    //     } catch (\Exception $e) {
    //         // Log the error message
    //         // \Log::error('Error inserting into HS_CODE_MT: ' . $e->getMessage());
    //         return response()->json(['error' => 'Failed to insert HS_CODE_MT data.'], 500);
    //     }
    // }


    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'hs_code' => 'required|string|max:30',
            'description' => 'required|string|max:300',
            'vds' => 'required',
            'exd' => 'required',
            'charge_description' => 'required|array',
            'cost_type' => 'required|array',
            'rate' => 'required|array',
            'control_head' => 'required|array'
        ]);
        // dd($request);
        // $companyCode = Auth()->user()->company_code;

        // Transaction to ensure atomic operations
        DB::transaction(function () use ($request) {
            // Insert data into HS_CODE_MT table
            $companyCode = Auth()->user()->company_code;
            $hsCodeMtId = DB::table('HS_CODE_MT')->insertGetId([
                'COMPANY_CODE' => $companyCode,
                'HS_CODE' => $request->hs_code,
                
                'SCHEDULE_FLAG' => 'DEFAULT',
                'HS_DESC' => $request->description,
                'VDS_FLAG' => $request->vds[0],
                'EXD' => $request->exd[0],
                'STATUS' => 'ACTIVE', // Example: you can set it as per your requirement
                'USER_ID' => auth()->user()->id, // Assuming you're using Laravel's auth system
                'ENTER_DATE' => now(),
                'LAST_UPDATE' => auth()->user()->id,
                'LAST_UPDATE_DATE' => now(),
            ], 'HS_CODE');
            // dd( $hsCodeMtId);


            // Insert data into HS_CODE_DT table (details table)
            $chargeDescriptions = $request->charge_description;
            $costTypes = $request->cost_type;
            $rates = $request->rate;
            $controlHeads = $request->control_head;

            for ($i = 0; $i < count($chargeDescriptions); $i++) {
                DB::table('HS_CODE_DT')->insert([
                    'COMPANY_CODE' => $companyCode,
                    'HSSYS_NO' => $hsCodeMtId,
                    'HS_CODE' => $request->hs_code,
                    'SL_NO' => $i + 1, // Serial number
                    'CONTROL_CODE' => $controlHeads[$i],
                    'COST_TYPE' => $costTypes[$i],
                    'RATE' => $rates[$i],
                    'USER_ID' => auth()->user()->id, // Assuming you're using auth system
                    'ENTER_DATE' => now(),
                    'LAST_UPDATE' => auth()->user()->id,
                    'LAST_UPDATE_DATE' => now(),
                ]);
            }
        });

        // Redirect to success page or back with a success message
        return redirect()->back()->with('success', 'HS Code information saved successfully.');
    }







    // public function store(Request $request)
    // {
    //     // Validate the request to ensure ACNAME is provided

    //     // dd($request->all());

    //     // Validate the request to ensure ACNAME is provided
    //     $request->validate([
    //         'hs_code' => 'required|string|max:30',   // Add this to validate HS Code field
    //         'description' => 'required|string|max:300',  // Validate description with max length of 300
    //         'vds' => 'required|array',
    //         'vds.*' => 'in:Y,N',
    //         'exd' => 'required|array',
    //         'exd.*' => 'in:Y,N',                       // Validate each item in the exd array


    //         'charge_description.*' => 'required|string', // Charge description must be a string
    //         'cost_type.*' => 'required|in:P,F', // Cost Type must be either 'P' (Percentage) or 'F' (Fixed)
    //         'rate.*' => 'required|numeric|min:0', // Rate must be a numeric value
    //         'control_head.*' => 'required|string',
    //     ]);
    //     // dd($request);

    //     // dd( $request);


    //     try {
    //         // Retrieve the logged-in user's company code
    //         $companyCode = Auth()->user()->company_code;

    //         // Determine the VDS_FLAG and EXD values based on the roll input
    //         $vds = $request->input('vds')[0];  // Get the first selected value (since it’s an array)
    //         $exd = $request->input('exd')[0];

    //         // Prepare the data to be inserted
    //         $data = [
    //             'COMPANY_CODE' => $companyCode,  // Logged-in user's company code
    //             'HS_CODE' => $request->input('hs_code'),
    //             'HS_DESC' => $request->input('description'),
    //             'VDS_FLAG' => $vds,
    //             'EXD' => $exd,
    //             'STATUS' => 'Active',  // Set default status
    //             'USER_ID' => auth()->user()->user_id ?? 'system',  // Set user or default 'system'
    //             'SCHEDULE_FLAG' => 'DEFAULT',  // Set default schedule flag
    //             'ENTER_DATE' => now(),  // Set current date for entry
    //         ];

    //         DB::table('HS_CODE_MT')->insert($data);


    //         // Hs_code_DT table data




    //         foreach ($request->charge_description as $key => $value) {
    //             $hs_code_dt_data = [
    //                 'COMPANY_CODE' => $companyCode,
    //                 'HS_CODE' => $request->hs_code,
    //                 'SL_NO' => $key + 1, // Serial number for each row
    //                 'CONTROL_CODE' => $request->control_head[$key],
    //                 'COST_TYPE' => $request->cost_type[$key],
    //                 'RATE' => $request->rate[$key],
    //                 'USER_ID' => $userId, // Corrected USER_ID field
    //                 'ENTER_DATE' => now(),
    //             ];

    //             // Debugging: Remove the extra `$`
    //             dd($hs_code_dt_data);

    //             // Insert into HS_CODE_DT
    //             DB::table('HS_CODE_DT')->insert($hs_code_dt_data);
    //         }













    //         // $insertedRecord = DB::table('HS_CODE_MT')->where('HS_CODE', $request->input('hs_code'))->first();
    //         // dd($insertedRecord);

    //         return redirect()->back()->with('success', 'HS Code added successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error saving HS Code: ' . $e->getMessage());
    //     }
    // }

    // public function store(Request $request)
    // {
    //     // ফর্ম থেকে সব ডেটা নেয়া হবে
    //     $hsCodeData = [
    //         'hs_code' => $request->hs_code,
    //         'description' => $request->description,
    //         'vds' => $request->vds[0],
    //         'exd' => $request->exd[0]
    //     ];
    //     // dd( $hsCodeData);

    //     // প্রথমে HS_CODE_MT টেবিলে ডেটা ইনসার্ট হবে
    //     $hsCodeId = DB::table('HS_CODE_MT')->insertGetId($hsCodeData);
    //      dd($hsCodeId);

    //     // এখন HS_CODE_DT টেবিলের জন্য ফর্ম ডেটা গুলো সংগ্রহ করব
    //     $chargeDescriptions = $request->charge_description;
    //     $costTypes = $request->cost_type;
    //     $rates = $request->rate;
    //     $controlHeads = $request->control_head;



    //     // একাধিক ডেটা লুপের মাধ্যমে HS_CODE_DT টেবিলে ইনসার্ট করা হবে
    //     for ($i = 0; $i < count($chargeDescriptions); $i++) {
    //         $hsCodeDetailData = [
    //             'hs_code_mt_id' => $hsCodeId, // HS_CODE_MT এর primary key ID সংরক্ষণ হবে
    //             'charge_description' => $chargeDescriptions[$i],
    //             'cost_type' => $costTypes[$i],
    //             'rate' => $rates[$i],
    //             'control_head' => $controlHeads[$i]
    //         ];

    //         dd($hsCodeDetailData);

    //         // HS_CODE_DT টেবিলে ডেটা ইনসার্ট করা হচ্ছে
    //         DB::table('HS_CODE_DT')->insert($hsCodeDetailData);
    //     }

    //     // সফল হলে রিডাইরেক্ট করা হবে
    //     return redirect()->back()->with('success', 'HS Code ডেটা সফলভাবে সংরক্ষণ করা হয়েছে!');
    // }





}
