<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\ForgotPassword;
use App\Notifications\PasswordReset;
use App\Notifications\ResetPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PasswordRestController extends Controller
{
    public function forgot()
    {
        return view('frontend.auth.passwords.forgot');
    }


    public function password(Request $request)
    {
        $email = $request->input('email');
        $this->validate($request, [
            'email' => 'required|email'
        ]);


        $user = User::where('email', '=', $email)->first();

        if ($user === null) {
            return redirect()->back();
        }

        $token = Str::random(60);


        try {
            $passwordLastInsert = DB::table('password_resets_tables')->insertGetId([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $user->sendResetEmail($email, $token);

            return 'sent';
        } catch (\Exception $exception) {

        }
    }


    public function showResetForm($token)
    {
        $tokenVerify = DB::table('password_resets_tables')->where('token', $token)->first();
        if ($tokenVerify === null) {
            return redirect()->route('forgot');
        }
        return view('frontend.auth.passwords.reset', compact('token'));

    }


    public function reset(Request $request, $token)
    {
        $tokenVerify = DB::table('password_resets_tables')->where('token', $token)->first();


        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);

        if ($tokenVerify->token == $token) {
            $user = User::where('email', $tokenVerify->email)->first();

            $user->update([
                'password' => app('hash')->make($request->input('password')),
            ]);
            $tokenVerify = DB::table('password_resets_tables')->where('email', $user->email)->delete();

//            Toastr::success('Password updated successfully.', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }

//        Toastr::error('Incorrect password.', 'error', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }


}
