<?php

namespace App\Http\Controllers;


use App\Models\SupplierClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // Fetch only necessary columns or apply specific formatting
    //     $companies = DB::table('ACT_DEBCRIMT')->select('COMPANY_CODE', 'DRCR_CODE', 'DRCR_NAME','SHORT_NAME')->get();

    //     // Debug data


    //     return view('setup.supplier_client.index', compact('companies'));
    // }
    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
//     {
//         // Define validation rules
//         $validator = Validator::make($request->all(), [
//             'drcr_code' => 'required|string|max:15',
//             'short_name' => 'nullable|string|max:30',
//             'drcr_name' => 'required|string|max:100',

//             'road_no' => 'nullable|string|max:50',
//             'house_no' => 'nullable|string|max:50',
//             'area' => 'nullable|string|max:50',
//             'city' => 'nullable|string|max:50',
//             'post_code' => 'nullable|string|max:10',
//             'country' => 'nullable|string|max:50',
//             'lan_no1' => 'nullable|string|max:20',
//             'vat_reg_type' => 'nullable|string|max:20',
//             'nid' => 'nullable|string|max:50',
//             'bin' => 'nullable|string|max:50',


//             // 'cell_no1' => 'nullable|string|max:20',
//             // 'ref_id' => 'nullable|string|max:50',
//             // 'currency' => 'nullable|string|max:50',
//             // 'email_id1' => 'nullable|email|max:100',


//             // 'web_address' => 'nullable|string|max:100',

//             // 'lan_no2' => 'nullable|string|max:20',
//             // 'cell_no2' => 'nullable|string|max:20',

//             // 'email_id2' => 'nullable|email|max:100',

//             // 'control_code_1' => 'nullable|string|max:255',
//             // 'control_code_2' => 'nullable|string|max:255',
//             // 'control_code_3' => 'nullable|string|max:255',
//             // 'header_1' => 'nullable|string|max:255',
//             // 'header_2' => 'nullable|string|max:255',
//             // 'header_3' => 'nullable|string|max:255',
//             // Add more validation rules if needed
//         ]);

//         $lastCompany = DB::table('ACT_DEBCRIMT')
//     ->select(DB::raw('COMPANY_CODE'))
//     ->orderByDesc('COMPANY_CODE')
//     ->first();

// $newCompanyCode = '0001'; // Default value if no company exists

// if ($lastCompany) {
//     // Increment the last company code by 1 and format it as a 4-digit string with leading zeros
//     $newCompanyCode = str_pad(((int)$lastCompany->company_code) + 1, 4, '0', STR_PAD_LEFT);
// }

//         // dd($validator);

//         // Check if validation fails
//         // if ($validator->fails()) {
//         //     return redirect()->back()->withErrors($validator)->withInput();
//         // }

//         // Insert the data into the database
//         DB::table('ACT_DEBCRIMT')->insert([
//             'DRCR_CODE' => $request->input('drcr_code'),
//             'SHORT_NAME' => $request->input('short_name'),
//             'DRCR_NAME' => $request->input('drcr_name'),
//             'VAT_REG_TYPE' => $request->input('vat_reg_type'),
//             'NID' => $request->input('nid'),
//             'BIN' => $request->input('bin'),







//             // 'ROAD_NO' => $request->input('road_no'),
//             // 'HOUSE_NO' => $request->input('house_no'),
//             // 'AREA' => $request->input('area'),
//             // 'CITY' => $request->input('city'),
//             // 'POST_CODE' => $request->input('post_code'),
//             // 'COUNTRY' => $request->input('country'),
//             // 'LAN_NO1' => $request->input('lan_no1'),
//             // 'WEB_ADDRESS' => $request->input('web_address'),

//             // 'CELL_NO1' => $request->input('cell_no1'),

//             // 'REF_ID' => $request->input('ref_id'),
//             // 'CURRENCY' => $request->input('currency'),
//             // 'EMAIL_ID1' => $request->input('email_id1'),


//             // 'LAN_NO2' => $request->input('lan_no2'),
//             // 'CELL_NO2' => $request->input('cell_no2'),

//             // 'EMAIL_ID2' => $request->input('email_id2'),

//             // 'control_code_1' => $request->input('control_code_1'),
//             // 'control_code_2' => $request->input('control_code_2'),
//             // 'control_code_3' => $request->input('control_code_3'),
//             // 'header_1' => $request->input('header_1'),
//             // 'header_2' => $request->input('header_2'),
//             // 'header_3' => $request->input('header_3'),

//             // Add more fields if needed
//         ]);

//         // return redirect()->route('act_debcrimt.index')->with('success', 'Record added successfully.');
//     }

    /**
     * Display the specified resource.
     */



     public function create()
     {
         return view('setup.supplier_client.create');
     }

     public function index()
     {
         // Fetch only necessary columns or apply specific formatting
         $companies = DB::table('ACT_DEBCRIMT')->select('COMPANY_CODE', 'DRCR_CODE', 'DRCR_NAME',
         'SHORT_NAME','DRCR_FLAG', 'BUSINESS_NATURE','CTRL_FLAG','DRCR_STATUS','REF_DRCR_CODE',
         'FUTURE_ONE','FUTURE_TWO','FUTURE_THREE','USER_ID','CONTACT_PERSON','GROUP_TYPE', 'FUTURE_FOUR','FUTURE_FIVE', 'NID', 'VAT_REG_TYPE', 'TRANS_CURRENCY','BIN')->get();

         // Debug data


         return view('setup.supplier_client.index', compact('companies'));
     }






    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'drcr_code' => 'required|string|max:15',
            'drcr_name' => 'required|string|max:100',
            'short_name' => 'nullable|string|max:25',
            'drcr_flag' => 'required|string|max:1',
            'business_nature' => 'nullable|string|max:30',
            'contact_person' => 'nullable|string|max:100',
            'group_type' => 'nullable|string|max:20',
            'ctrl_flag' => 'nullable|string|max:5',
            'drcr_status' => 'nullable|string|max:1',
            'ref_drcr_code' => 'nullable|string|max:10',
            'future_one' => 'nullable|string|max:30',
            'future_two' => 'nullable|string|max:100',
            'future_three' => 'nullable|date',
            'user_id' => 'nullable|string|max:30',
            // 'last_update' => 'nullable|string|max:30',
            // 'last_update_date' => 'nullable|date',
           // 'address' => 'nullable|string|max:255',
           // 'contact_detail' => 'nullable|string|max:255',
            'future_four' => 'nullable|string|max:100',
            'future_five' => 'nullable|date',
            'nid' => 'nullable|string|max:30',
            'vat_reg_type' => 'nullable|string|max:50',
            'trans_currency' => 'nullable|string|max:10',
            'bin' => 'nullable|string|max:20',
        ]);
        // dd($validator);
        $now = now()->format('Y-m-d H:i:s');
        // Check if validation fails
        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator)->withInput();
            echo '';
        }

        // Generate a new COMPANY_CODE
        $lastCompany = DB::table('ACT_DEBCRIMT')
            ->select(DB::raw('COMPANY_CODE'))
            ->orderByDesc('COMPANY_CODE')
            ->first();


        $newCompanyCode = '0001'; // Default value if no company exists

        if ($lastCompany) {
            // Increment the last company code by 1 and format it as a 4-digit string with leading zeros
            $newCompanyCode = str_pad(((int)$lastCompany->company_code) + 1, 4, '0', STR_PAD_LEFT);
        }

        // Insert the data into the database
        DB::table('ACT_DEBCRIMT')->insert([
            'COMPANY_CODE' => $newCompanyCode,
            'DRCR_CODE' => $request->input('drcr_code'),
            'DRCR_NAME' => $request->input('drcr_name'),
            'SHORT_NAME' => $request->input('short_name'),
            'DRCR_FLAG' => 'D',
            'BUSINESS_NATURE' => $request->input('business_nature'),
            'CONTACT_PERSON' => $request->input('contact_person'),
            'GROUP_TYPE' => $request->input('group_type'),
            'TRANS_CURRENCY' => $request->input('currency'),

            'CTRL_FLAG' => 'Hlw',
            'DRCR_STATUS' => 'A',
            'REF_DRCR_CODE' => '003',
            'FUTURE_ONE' => 'Hlw',
            'FUTURE_TWO' => 'Hlw',
            'FUTURE_THREE' => $now,
            'USER_ID' => '01',
    //        'ENTER_DATE' => $now, // Insert the formatted date
    // 'LAST_UPDATE' => $now, // Assuming LAST_UPDATE is a VARCHAR2 and needs the date in string format
    // 'LAST_UPDATE_DATE' => $now,
            // 'ADDRESS' => $request->input('address'),
            //'CONTACT_DETAIL' => $request->input('contact_detail'),
            'FUTURE_FOUR' => 'Hlw',
            'FUTURE_FIVE' => $now,
            'NID' => $request->input('nid'),
            'VAT_REG_TYPE' => $request->input('VAT_REG_TYPE'),
            'BIN' => $request->input('bin'),
        ]);


        return redirect()->back()->with('success', 'Data inserted successfully');
    }



    public function show(SupplierClient $supplierClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company_code = '0001'; // Example value, make sure it's correctly formatted

        // Fetch only the simple data types, excluding complex ADTs
        $company = DB::selectOne('
            SELECT
                "COMPANY_CODE", "DRCR_CODE", "DRCR_NAME", "SHORT_NAME", "DRCR_FLAG",
                "BUSINESS_NATURE", "CONTACT_PERSON", "GROUP_TYPE", "CTRL_FLAG", "DRCR_STATUS",
                "REF_DRCR_CODE", "FUTURE_ONE", "FUTURE_TWO", "FUTURE_THREE", "USER_ID",
                "ENTER_DATE", "LAST_UPDATE", "LAST_UPDATE_DATE", "FUTURE_FOUR", "FUTURE_FIVE",
                "NID", "VAT_REG_TYPE", "TRANS_CURRENCY", "BIN"
            FROM
                "ACT_DEBCRIMT"
            WHERE
                "COMPANY_CODE" = ?', [$company_code]);

        if (!$company) {
            return redirect()->back()->with('error', 'Company not found');
        }

        return view('setup.supplier_client.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'drcr_code' => 'required|string|max:15',
            'drcr_name' => 'required|string|max:100',
            'short_name' => 'nullable|string|max:25',
            'drcr_flag' => 'required|string|max:1',
            'business_nature' => 'nullable|string|max:30',
            'contact_person' => 'nullable|string|max:100',
            'group_type' => 'nullable|string|max:20',
            'ctrl_flag' => 'nullable|string|max:5',
            'drcr_status' => 'nullable|string|max:1',
            'ref_drcr_code' => 'nullable|string|max:10',
            'future_one' => 'nullable|string|max:30',
            'future_two' => 'nullable|string|max:100',
            'future_three' => 'nullable|date',
            'user_id' => 'nullable|string|max:30',
            'future_four' => 'nullable|string|max:100',
            'future_five' => 'nullable|date',
            'nid' => 'nullable|string|max:30',
            'vat_reg_type' => 'nullable|string|max:50',
            'trans_currency' => 'nullable|string|max:10',
            'bin' => 'nullable|string|max:20',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Update the data in the database
            $updated = DB::table('ACT_DEBCRIMT')
                ->where('COMPANY_CODE', $id)
                ->update([
                    'DRCR_CODE' => $request->input('drcr_code'),
                    'DRCR_NAME' => $request->input('drcr_name'),
                    'SHORT_NAME' => $request->input('short_name'),
                    'DRCR_FLAG' => $request->input('drcr_flag'),
                    'BUSINESS_NATURE' => $request->input('business_nature'),
                    'CONTACT_PERSON' => $request->input('contact_person'),
                    'GROUP_TYPE' => $request->input('group_type'),
                    'CTRL_FLAG' => $request->input('ctrl_flag'),
                    'DRCR_STATUS' => $request->input('drcr_status'),
                    'REF_DRCR_CODE' => $request->input('ref_drcr_code'),
                    'FUTURE_ONE' => $request->input('future_one'),
                    'FUTURE_TWO' => $request->input('future_two'),
                    'FUTURE_THREE' => $request->input('future_three'),
                    'USER_ID' => $request->input('user_id'),
                    'FUTURE_FOUR' => $request->input('future_four'),
                    'FUTURE_FIVE' => $request->input('future_five'),
                    'NID' => $request->input('nid'),
                    'VAT_REG_TYPE' => $request->input('vat_reg_type'),
                    'BIN' => $request->input('bin'),
                    'TRANS_CURRENCY' => $request->input('trans_currency'),
                ]);

            if ($updated) {
                return redirect()->route('c&s.index')->with('success', 'Company updated successfully');
            } else {
                return redirect()->back()->with('error', 'No changes were made to the company.');
            }
        } catch (\Exception $e) {
            // Handle any errors during the update process
            return redirect()->back()->with('error', 'An error occurred while updating the company: ' . $e->getMessage());
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Delete the record with the given COMPANY_CODE
            $deleted = DB::table('ACT_DEBCRIMT')->where('COMPANY_CODE', $id)->delete();

            if ($deleted) {
                return redirect()->route('c&s.index')->with('success', 'Company deleted successfully');
            } else {
                return redirect()->back()->with('error', 'Company not found or already deleted.');
            }
        } catch (\Exception $e) {
            // Handle any errors during the delete process
            return redirect()->back()->with('error', 'An error occurred while deleting the company: ' . $e->getMessage());
        }
    }

}
