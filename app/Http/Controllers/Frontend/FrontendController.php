<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //Display login page for backend administrative login
    public function show_login()
    {
        return view('frontend.layouts.login_backend');
    }
}
