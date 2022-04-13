<?php

namespace App\Http\Controllers\Backend;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.layouts.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layouts.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|unique:users',
            ]
        );

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'designation' => $request->designation,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'image' => $request->image,
                'role' => $request->role,
                'status' => $request->status,
                'password' => bcrypt($request->password),
            ]);
            if ($request->hasFile('image')) {
                $uploaded_profile_img = $request->file('image');
                $new_profile_img_name = uniqid('profile_', true) . "." . $uploaded_profile_img->extension();
                $uploaded_profile_img->move(public_path('user/profile'), $new_profile_img_name);
                $user->image = $new_profile_img_name;

                User::find($user->id)->update([
                    'image' => $new_profile_img_name
                ]);
            }
            return redirect()->route('users.index')->with('success', 'User Added Successfully');
        } catch (Throwable $e) {
            // dd($e->getMessage());
            return redirect()->route('users.create')->with('error', "Sorry, User can't be added.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.layouts.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            // $user = File::find($id);
            if ($request->hasFile('image')) {
                //is your old photo default photo or not
                if ($user->image != null) {
                    //delete the old photo
                    $location = public_path() . "/user/profile/" . $user->image;
                    unlink($location);
                }

                $uploaded_profile_img = $request->file('image');
                $new_profile_img_name = uniqid('profile_', true) . "." . $uploaded_profile_img->extension();
                $uploaded_profile_img->move(public_path('user/profile'), $new_profile_img_name);
                $user->image = $new_profile_img_name;
            }

            $user->name = $request->name;
            $user->designation = $request->designation;
            $user->phone = $request->phone;
            $user->mobile = $request->mobile;
            $user->role = $request->role;
            $user->status = $request->status;
            $user->save();

            if(auth()->user()->id == $user->id) {
                return redirect()->route('dashboard')->with('success', 'Your Information Updated Successfully');
            } else {
                return redirect()->route('users.index')->with('success', 'User Information Updated Successfully');
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->route('users.edit')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
