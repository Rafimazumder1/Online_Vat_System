<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function index()
    {

        $companies = DB::table('ABC_COMPANY')->get();


        return view('index', compact('companies'));

        // return view('index');
    }

}

