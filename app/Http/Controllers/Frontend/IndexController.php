<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller

{
    public function index()
    {
        return view('frontend.layouts.index');
    }
}
