<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Auth;
use File;
use Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('backend.adminProfile.dashboard',compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.adminProfile.profile',compact('user','divisions','districts'));
    }

    public function profileUpdate(Request $request)
    {
        $user= Auth::user();
        $this->validate($request, [
            'name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed',
            'phone_no' => 'required|max:16|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/|unique:users,phone_number,'.$user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->password != NULL || $request->password != "") {
            $user->password = app('hash')->make($request->input('password'));
        }
        $user->phone_no = $request->input('phone_no');

        // Insert Image into User Image Model (Only for one image)
        if ($request->hasFile('avatar')) {
            //Insert that Image
            $avatar = $request->file('avatar');
            $img = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('images/admins/' . $img);
            Image::make($avatar)->save($location);
            $user->avatar = $img;
        }

        $user->save();
        session()->flash('success', 'Admin profile has updated successfully!!');
        return back();
    }
}
