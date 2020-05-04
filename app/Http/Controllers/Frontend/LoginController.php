<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->input('email'), 'password' => $request->input('password')
        ];
        if (Auth::guard('web')->attempt($credentials)) {

//            Toastr::success('Successfully', 'Login', ["positionClass" => "toast-top-right"]);
            return redirect()->intended(route('home'));
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
//        Toastr::success('Logout successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
    }
}
