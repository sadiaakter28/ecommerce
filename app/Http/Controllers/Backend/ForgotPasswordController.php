<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('frontend.auth.admin.passwords.forgot');
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    public function sendResetLinkEmail(Request $request)
    {
//        dd('test');
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

            return view('frontend.auth.verify');
        } catch (\Exception $exception) {

        }
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.auth.admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
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
