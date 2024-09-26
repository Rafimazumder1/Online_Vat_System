<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyInformationController extends Controller
{
    // Display a listing of the companies
    public function index()
    {
       $companies = DB::table('ABC_COMPANY')->get();
        return view('setup.companyinfo.index', compact('companies'));
    }

    // Show the form for creating a new company

    public function create()
    {
        return view('setup.companyinfo.create');
    }

    // Store a newly created company in storage
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:100',
            'short_name' => 'required|string|max:6',
            'company_type' => 'required|string|max:100',
            'business_activity' => 'required|string|max:100',
            'bin' => 'required|string|max:25',
            'rep_currency' => 'required|string|max:15',
           'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vat_registration_date' => 'required|date',
            'address' => 'required|string|max:255',
            'reg_no' => 'nullable|string|max:15',
        ]);


       // Fetch the latest company code

    // $lastCompany = DB::table('ABC_COMPANY')->orderBy('company_code', 'desc')->first(); //this and upder 4 line same
    $lastCompany = DB::table('ABC_COMPANY')
    ->select('COMPANY_CODE')
    ->orderByDesc('COMPANY_CODE')
    ->first();
    $newCompanyCode = '0001'; // Default value if no company exists

    if ($lastCompany) {
        // Increment the last company code by 1 and format it as a 4-digit string with leading zeros
        $newCompanyCode = str_pad(((int)$lastCompany->company_code) + 1, 4, '0', STR_PAD_LEFT);
    }

    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $logoName = $newCompanyCode . '_' . time() . '.' . $logo->getClientOriginalExtension();
        $logoPath = $logo->storeAs('logos', $logoName, 'public'); // Save in the 'public/logos' directory
    }




        DB::table('ABC_COMPANY')->insert([
            'COMPANY_CODE' =>$newCompanyCode,
            'COMPANY_NAME' => $data['company_name'],
            'SHORT_FORM' => $data['short_name'],
            'COMPANY_TYPE' => $data['company_type'],
            'BUSINESS_ACTIVITY' => $data['business_activity'],
            'BIN' => $data['bin'],
            'REP_CURRENCY' => $data['rep_currency'],
            //'LOGO' => $data['logo'],
            'VAT_REG_DATE' => $data['vat_registration_date'],
            'COMPANY_ADD' => $data['address'],
            'REG_NO' => $data['reg_no'],
            'RELATED_COMPANY'=>'0001',
            'LOGO' => $logoPath, // Save the logo path
        ]);



        return redirect()->route('com.index')->with('success', 'Company created successfully.');
    }

    // Display the specified company
    // public function show($id)
    // {
    //     $company = DB::table('ABC_COMPANY')->where('COMPANY_CODE', $id)->first();
    //     return view('setup.companyinfo.index', compact('company'));
    // }

    // Show the form for editing the specified company
    public function edit($id)
    {
        $company = DB::table('ABC_COMPANY')->where('COMPANY_CODE', $id)->first();

        if (!$company) {
            return redirect()->route('com.index')->with('error', 'Company not found.');
        }

        return view('setup.companyinfo.edit', compact('company'));
    }


    public function destroy($company_code)
    {
        // Check if the company exists before attempting to delete
        $company = DB::table('ABC_COMPANY')->where('COMPANY_CODE', $company_code)->first();

        if (!$company) {
            return redirect()->route('com.index')->with('error', 'Company not found.');
        }

        // Delete the company
        DB::table('ABC_COMPANY')->where('COMPANY_CODE', $company_code)->delete();

        return redirect()->route('com.index')->with('success', 'Company deleted successfully.');
    }


    public function update(Request $request, $company_code)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'company_name' => 'required|string|max:100',
            'short_name' => 'required|string|max:6',
            'company_type' => 'required|string|max:100',
            'business_activity' => 'required|string|max:100',
            'bin' => 'required|string|max:25',
            'rep_currency' => 'required|string|max:15',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'vat_registration_date' => 'required|date',
            'address' => 'required|string|max:255',
            'reg_no' => 'nullable|string|max:15',
        ]);

        // Check if the company exists
        $company = DB::table('ABC_COMPANY')->where('COMPANY_CODE', $company_code)->first();

        if (!$company) {
            return redirect()->route('com.index')->with('error', 'Company not found.');
        }

        // Handle the logo upload
        $logoPath = $company->logo; // Keep existing logo path if no new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($logoPath && Storage::disk('public')->exists($logoPath)) {
                Storage::disk('public')->delete($logoPath);
            }

            // Upload new logo
            $logo = $request->file('logo');
            $logoName = $company_code . '_' . time() . '.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('logos', $logoName, 'public');
        }

        // Update company information
        DB::table('ABC_COMPANY')->where('COMPANY_CODE', $company_code)->update([
            'COMPANY_NAME' => $data['company_name'],
            'SHORT_FORM' => $data['short_name'],
            'COMPANY_TYPE' => $data['company_type'],
            'BUSINESS_ACTIVITY' => $data['business_activity'],
            'BIN' => $data['bin'],
            'REP_CURRENCY' => $data['rep_currency'],
            // 'VAT_REG_DATE' => $data['vat_registration_date'],
            'COMPANY_ADD' => $data['address'],
            'REG_NO' => $data['reg_no'],
            'LOGO' => $logoPath, // Save the new logo path
        ]);

        return redirect()->route('com.index')->with('success', 'Company updated successfully.');
    }







}
