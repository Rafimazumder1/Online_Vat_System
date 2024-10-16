<?php

namespace App\Http\Controllers;

use App\Models\Iteminfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IteminfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index()
     {
         $hs = DB::table('HS_CODE_MT')->get();
         $chart = DB::table('ACT_COA')->get();
         $items = DB::table('INV_ITEM_MT')->get();
        //  dd( $items);
         $itemsuom = DB::table('INV_ITEM_UOM')->get();

         // Pass multiple variables to the view correctly
         return view('setup.iteminfo.index', compact('itemsuom', 'chart', 'hs', 'items'));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ITEM_NAME' => 'required|string|max:100',
            'CAT_CODE' => 'required|integer',
            'TYPE_CODE' => 'required|integer',
            'ACCODE' => 'required|string|max:9',
            'HS_CODE' => 'required|string|max:30',
            'PCONV_FACTOR' => 'required|numeric',
            'PITEM_UOM' => 'required|string|max:20',
            'SCONV_FACTOR' => 'required|numeric',
            'SITEM_UOM' => 'required|string|max:20',
        ]);
        // dd( $validatedData);

        // Insert the item into the database using the DB facade
        DB::table('INV_ITEM_MT')->insert([
            'ITEM_NAME' => $validatedData['ITEM_NAME'],
            'CAT_CODE' => 1234, // Hardcoded value for CAT_CODE
            'TYPE_CODE' =>123,
            'ACCODE' => $validatedData['ACCODE'],
            'HS_CODE' => $validatedData['HS_CODE'],
            'PCONV_FACTOR' => $validatedData['PCONV_FACTOR'],
            'PITEM_UOM' => $validatedData['PITEM_UOM'],
            'SCONV_FACTOR' => $validatedData['SCONV_FACTOR'],
            'SITEM_UOM' => $validatedData['SITEM_UOM'],
            'USER_ID' => auth()->user()->user_id ?? 'system',
            // 'created_at' => now(), // Add timestamps if needed
            // 'updated_at' => now(),
        ]);


        // Redirect with a success message
        return redirect()->route('create.item.form')->with('success', 'Item created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Iteminfo $iteminfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($item_code)
    {

        $chart = DB::table('ACT_COA')->get();
        $itemsuom = DB::table('INV_ITEM_UOM')->get();
        // Fetch the item based on the item_code
        $item = DB::table('INV_ITEM_MT')
                    ->where('ITEM_CODE', $item_code)
                    ->first(); // Get the first record

        // Check if the item exists
        if (!$item) {
            return redirect()->route('item.index')->with('error', 'Item not found.');
        }

        // Return the view for editing the item
        return view('setup.iteminfo.edit', compact('item','chart','itemsuom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $item_code)
    {
        // Validate the incoming request
        $request->validate([
            'ITEM_NAME' => 'required|string|max:255',
            'CAT_CODE' => 'required|string|max:255',
            'TYPE_CODE' => 'required|string|max:255',
            'ACCODE' => 'required|string|max:255',
            'HS_CODE' => 'required|string|max:255',
            'PCONV_FACTOR' => 'required|numeric',
            'PITEM_UOM' => 'required|integer',
            'SCONV_FACTOR' => 'required|numeric',
            'SITEM_UOM' => 'required|integer',
        ]);
        // dd( $request);

        // Update the item in the database
        $updated = DB::table('INV_ITEM_MT')
            ->where('ITEM_CODE', $item_code)
            ->update([
                'ITEM_NAME' => $request->ITEM_NAME,
                'CAT_CODE' => $request->CAT_CODE,
                'TYPE_CODE' => $request->TYPE_CODE,
                'ACCODE' => $request->ACCODE,
                'HS_CODE' => $request->HS_CODE,
                'PCONV_FACTOR' => $request->PCONV_FACTOR,
                'PITEM_UOM' => $request->PITEM_UOM,
                'SCONV_FACTOR' => $request->SCONV_FACTOR,
                'SITEM_UOM' => $request->SITEM_UOM,
                // '' => now(), // Optionally include a timestamp
            ]);

            // dd( $updated);

        // Check if the update was successful
        if ($updated) {
            return redirect()->route('edit.items', ['item_code' => $item_code])->with('success', 'Item updated successfully.');

        } else {
            return redirect()->back()->with('error', 'Failed to update the item.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
   /**
 * Remove the specified resource from storage.
 */
public function destroy($item_code)
{
    // Find the item based on item_code
    $item = DB::table('INV_ITEM_MT')->where('ITEM_CODE', $item_code)->first();

    // Check if the item exists
    if (!$item) {
        return redirect()->route('item.index')->with('error', 'Item not found.');
    }

    // Perform the deletion
    $deleted = DB::table('INV_ITEM_MT')->where('ITEM_CODE', $item_code)->delete();

    // Check if the deletion was successful
    if ($deleted) {
        return redirect()->route(route: 'create.item.form')->with('success', 'Item deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to delete the item.');
    }
}

}
