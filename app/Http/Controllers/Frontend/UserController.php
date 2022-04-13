<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->status == 'Active') {
                if (auth()->user()->role != 'User') {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->back()->with('error', 'User Login is Prohibited Here.');
                }
            }
            Auth::logout();
            return redirect()->back()->with('error', 'Your Account is Deactivated.');
        }
        return redirect()->back()->with('error', 'Invalid/Wrong Email/Password! To reset, please contact with the System Administrator.');
    }

    //Destroy current session and redirect them to either index or admin login as per role
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Successfully logged out.');;
    }
}
