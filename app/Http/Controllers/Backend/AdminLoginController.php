<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\VerifyRegistration;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.admin.login');
    }

    public function login(Request $request)
    {
//        dd('test');
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        //Login this admin
        if (Auth::guard('admin')->attempt($credentials)) {
//            Toastr::success('Successfully', 'Login', ["positionClass" => "toast-top-right"]);
            session()->flash('success', 'Successfully Login');
            return redirect()->intended(route('admin.index'));
        } else {
            session()->flash('sticky_error', 'Invalid Login');
            return back();
        }

    }


    public function verifyEmail($token)
    {
        if ($token === null) {
            return redirect()->route('home')->with('error', 'Invalid Token');
        }

        $admin = Admin::where('email_verification_token', $token)->first();

        if ($admin === null) {
            return redirect()->route('home')->with('error', 'Invalid Verification Link.');
        }

        $admin->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => null,
        ]);
        session()->flash('success', 'Your account is activated. You can login now.');
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        session()->invalidate();
        return redirect()->route('admin.login');
    }
}
