<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
//use App\Notifications\VerifyEmail;
//use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('frontend.auth.registration');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'phone_number' => 'required|max:16|unique:users,phone_number|regex:/^\+?(88)?0?1[3456789][0-9]{8}\b/',
        ]);

        $photo = $request->file('image');
        $file_name = '';
        if ($photo) {
            $file_name = uniqid('image_', true) . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/users'), $file_name);
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => app('hash')->make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
//            'role' => 'customer',
//            'image' => 'uploads/users/' . $file_name,
//            'email_verified_at' => trim($request->input('email_verified_at')),
//            'email_verification_token' => str::random(30),
        ];
        $user = User::create($data);
//        $user->notify(new VerifyEmail($user));
//        Toastr::success('Registration successfully. Please Verify your email to login.', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home', compact('user'));
    }
}
