<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.user.dashboard',compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('frontend.user.profile',compact('user','divisions','districts'));
    }

    public function profileUpdate(Request $request)
    {
        $user= Auth::user();
        $this->validate($request, [
            'first_name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'last_name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'username' => 'required|max:64|alpha_dash|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' => 'confirmed',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_number' => 'required|max:16|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/|unique:users,phone_number,'.$user->id,
            'street_address' => 'required|max:100',
        ]);

        $photo = $request->file('image');
        $file_name = '';
        if ($photo) {
            $file_name = uniqid('image_', true) . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/users'), $file_name);
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->password != NULL || $request->password != "") {
            $user->password = app('hash')->make($request->input('password'));
        }
        $user->phone_number = $request->input('phone_number');
        $user->division_id = $request->input('division_id');
        $user->district_id = $request->input('district_id');
        $user->street_address = $request->input('street_address');
        $user->shipping_address = $request->input('shipping_address');
        $user->ip_address = request()->ip();
        $user->remember_token = str_random(50);
        $user->save();
        session()->flash('success', 'User profile has updated successfully!!');
        return back();
    }
}
