<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function edit_password($id)
    {
        $user = User::find($id);
        return view('backend.layouts.user.password', compact('user'));
    }

    /**
     * Check current password is correct or not
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkCurrentPwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $hashPwd = Auth::user()->password;
            if (Hash::check($data['current_pwd'], $hashPwd)) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    /**
     * Check current password is correct or not and
     * match new and confirm password is same or not and update accordingly
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentPwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $hashPwd = Auth::user()->password;
            if (Hash::check($data['current_password'], $hashPwd)) {
                if ($data['new_password'] == $data['confirm_password']) {
                    if(auth()->user()->id == $request->user_id) {
                        User::where('id', Auth::user()->id)->update(['password' => bcrypt($data['new_password'])]);

                        return redirect()->route('dashboard')->with('success', 'Your Password Updated Successfully');
                    }
                    else{
                        User::where('id', $request->user_id)->update(['password' => bcrypt($data['new_password'])]);

                        return redirect()->route('users.index')->with('success', 'User Password Updated Successfully');
                    }
                }
                else {
                    return redirect()->route('dashboard')->with('error', 'New and confirm password did not match');
                }
            }
        }
    }
}
