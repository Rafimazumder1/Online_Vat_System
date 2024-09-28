<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Import the base controller

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests; // Use the traits for authorization and validation
}
