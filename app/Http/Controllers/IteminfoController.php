<?php

namespace App\Http\Controllers;

use App\Models\Iteminfo;
use Illuminate\Http\Request;

class IteminfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
         return view('setup.iteminfo.index');
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
        //
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
    public function edit(Iteminfo $iteminfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iteminfo $iteminfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iteminfo $iteminfo)
    {
        //
    }
}
