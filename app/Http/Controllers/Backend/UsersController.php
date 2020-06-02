<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
use Auth;
use File;
use Image;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        if (!is_null($user))
        {
            return view('backend.users.edit', compact('user','divisions','districts'));
        }
        else
        {
            return redirect()->route('backend.users');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'first_name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'last_name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'username' => 'required|max:64|alpha_dash|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_number' => 'required|max:16|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/|unique:users,phone_number,'.$user->id,
            'street_address' => 'required|max:100',
        ]);

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

        //Insert Image into UserImage Model(Only for one image)
        if ($request->hasFile('avatar')) {
            //Delete the old image from folder
            if (File::exists('images/users/' . $user->avatar))
            {
                File::delete('images/users/' . $user->avatar);
            }
            //Insert that Image
            $avatar = $request->file('avatar');
            $img = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('images/users/' . $img);
            Image::make($avatar)->save($location);
            $user->avatar = $img;
        }
        $user->save();
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.users');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!is_null($user))
        {
            //Delete User image
            if (File::exists('images/users/' . $user->avatar))
            {
                File::delete('images/users/' . $user->avatar);
            }
            $user->delete();
        }
        session()->flash('success', 'User has Deleted Successfully!!');
        return back();
    }


}
