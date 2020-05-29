<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyRegistration;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
//        dd($credentials);
//        its not working
        if ($user->status == 1) {
            //Login this user
            if (Auth::guard('web')->attempt($credentials)) {
//            Toastr::success('Successfully', 'Login', ["positionClass" => "toast-top-right"]);
                session()->flash('success', 'Successfully Login');
                return redirect()->intended(route('home'));
            }else {
                session()->flash('sticky_error', 'Invalid Login');
                return redirect()->route('login');
            }
        }else {
                if (!is_null($user)) {
                    $user->notify(new VerifyRegistration($user));
                    session()->flash('success', 'A new confirmation email has sent to you.. Please check and confirm your email');
                    return redirect()->route('home');
                } else {
                    session()->flash('sticky_error', 'Please check and confirm your email');
                    return redirect()->route('login');
                }
            }
        }


    public function verifyEmail($token)
    {
        if ($token === null) {
            return redirect()->route('home')->with('error', 'Invalid Token');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user === null) {
            return redirect()->route('home')->with('error', 'Invalid Verification Link.');
        }

        $user->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => null,
        ]);
        session()->flash('success', 'Your account is activated. You can login now.');
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
//        Toastr::success('Logout successfully', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('home');
    }
}
