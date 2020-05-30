<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $tokenVerify = DB::table('password_resets_tables')->where('token', $token)->first();
        if ($tokenVerify === null) {
            return redirect()->route('forgot');
        }
        return view('frontend.auth.passwords.reset', compact('token'));
    }
}
