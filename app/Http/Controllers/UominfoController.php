<?php

namespace App\Http\Controllers;

// use App\Models\uominfo;

use App\Models\uominfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Auth\SessionGuard;

class UominfoController extends Controller
{

    public function index() {
        $uomData = uominfo::all(); // Assuming you have a UOM model to fetch data
        return view('setup.uominfo.index', compact('uomData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uomData = uominfo::all(); // Fetch UOM data
        return view('setup.uominfo.create', compact('uomData'));
    }

    public function store(Request $request)
{
    $data = $request->all();

    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'User not authenticated'], 401);
    }

    $userId = $user->user_id;

    // Prepare the data for insertion
    $uoms = [];
    foreach ($data['uom'] as $index => $uom) {
        $uoms[] = [
            'UOM' => $uom,
            'UOM_DESC' => $data['description'][$index],
            'USER_ID' => $userId,
            'LAST_UPDATE' => now(),
            'LAST_UPDATE_DATE' => now(),
            'UOM_SLNO' => $data['uom_slno'][$index]
        ];
    }

    // Insert the data into the database
    DB::table('INV_ITEM_UOM')->insert($uoms);

    return redirect()->route(route: 'uom.index')->with('success', 'uom created successfully.');

    // return response()->json(['success' => 'Data inserted successfully']);
}







    // Redirect or return response






    /**
     * Display the specified resource.
     */
    public function show(uominfo $uominfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $uominfo = uominfo::where('uom_slno', $id)->firstOrFail();
        return view('setup.uominfo.edit', compact('uominfo'));
    }

    /**
     * Update the specified resource in storage.
     */
   /**
 * Update the specified resource in storage.
 */
// public function update(Request $request, $id)
// {
//     $request->validate([
//         'uom' => 'required|string|max:255',
//         'description' => 'required|string|max:255',
//     ]);

//     // Find the record by `uom_slno`
//     $uom = uominfo::where('uom_slno', $id)->firstOrFail();

//     // Update the record
//     $uom->UOM = $request->input('uom');
//     $uom->UOM_DESC = $request->input('description');
//     $uom->USER_ID = Auth::id(); // Assuming USER_ID is to be updated with the currently logged-in user
//     $uom->LAST_UPDATE = now();
//     $uom->LAST_UPDATE_DATE = now();
//     dd( $uom);

//     // Save the changes
//     $uom->save();

//     return redirect()->route('uom.create')->with('success', 'Data updated successfully');
// }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(uominfo $uominfo)
    // {
    //     //
    // }



    public function update(Request $request, $id)
    {
        // Validate input values
        $validatedData = $request->validate([
            'uom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        try {
            // Update the UOM information directly in the database
            $affectedRows = DB::table('INV_ITEM_UOM')
                ->where('uom_slno', $id)
                ->update([
                    'uom' => $validatedData['uom'],
                    'uom_desc' => $validatedData['description'],
                    'user_id' => Auth::id(),
                    'last_update' => now(),
                    'last_update_date' => now(),
                ]);

            // Check if any rows were affected
            if ($affectedRows > 0) {
                // Redirect back with a success message
                return redirect()->route('uom.create')->with('success', 'UOM information updated successfully');
            } else {
                // Handle case where no rows were affected
                return redirect()->back()->with('error', 'No UOM information found to update.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Log the error message
            \Log::error('Database query exception: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error updating the UOM information. Please try again.');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('General exception: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }


    public function destroy($id)
    {
        try {
            // Attempt to delete the UOM record with the given ID
            $deleted = DB::table('INV_ITEM_UOM')->where('uom_slno', $id)->delete();

            // Check if any rows were deleted
            if ($deleted) {
                // Redirect back with a success message
                return redirect()->route('uom.index')->with('success', 'UOM information deleted successfully');
            } else {
                // Handle case where no rows were deleted
                return redirect()->back()->with('error', 'No UOM information found to delete.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Log the error message
            \Log::error('Database query exception: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error deleting the UOM information. Please try again.');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('General exception: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }



}
