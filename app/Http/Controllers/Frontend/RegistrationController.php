<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\User;
//use App\Notifications\VerifyEmail;
//use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('frontend.auth.registration',compact('divisions', 'districts'));
    }

    public function registration(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'last_name' => 'nullable|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone_number' => 'required|max:16|unique:users,phone_number|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/',
            'street_address' => 'required|max:100',
        ]);

        $photo = $request->file('image');
        $file_name = '';
        if ($photo) {
            $file_name = uniqid('image_', true) . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/users'), $file_name);
        }

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => str_slug($request->input('first_name').$request->input('last_name')),
            'email' => $request->input('email'),
            'password' => app('hash')->make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'division_id' => $request->input('division_id'),
            'district_id' => $request->input('district_id'),
            'street_address' => $request->input('street_address'),
            'ip_address' => request()->ip(),
            'remember_token' => str_random(50),
            'status' => 1,
//            'role' => 'customer',
//            'image' => 'uploads/users/' . $file_name,
//            'email_verified_at' => trim($request->input('email_verified_at')),
//            'email_verification_token' => str::random(30),
        ];
        $user = User::create($data);
//        $user->notify(new VerifyRegistration($user));
        session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
//        $user->notify(new VerifyEmail($user));
//        Toastr::success('Registration successfully. Please Verify your email to login.', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home', compact('user'));
    }
}
