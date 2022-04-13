<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cost;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $users = User::all();

        return view('backend.layouts.index', compact('users'));
    }

    public function settingIndex()
    {
        return view('backend.layouts.cost.setting.setting_index');
    }

    public function coming()
    {
        return view('backend.layouts.coming');
    }
}
