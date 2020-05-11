<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\PasswordReset;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PasswordRestController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('frontend.auth.passwords.reset');
    }

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email'
            ]);
        } catch (ValidationException $exception) {
            return redirect()->back();
        }

        $user = Admin::where('email', '=', $request->input('email'))->first();

        if ($user === null) {
            return redirect()->back();
        }
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
        $user = Admin::where('email', $email)->select('name', 'email')->first();
        $user->notify(new PasswordReset($user, $token));

    }

    public function showResetForm($token)
    {
        $tokenVerify = DB::table('password_resets')->where('token', $token)->first();
        if ($tokenVerify === null) {
            return redirect()->route('rest.form');
        }
        return view('frontend.auth.passwords.reset');

    }

    public function reset(Request $request, $token)
    {
        $tokenVerify = DB::table('password_resets')->where('token', $token)->first();
        if ($tokenVerify->token == $token) {
            $user = User::where('email', $tokenVerify->email)->first();
            $user->update([
                'password' => app('hash')->make($request->input('password')),
            ]);
            $tokenVerify = DB::table('password_resets')->where('email', $user->email)->delete();

            Toastr::success('Password updated successfully.', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }

        Toastr::error('Incorrect password.', 'error', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
