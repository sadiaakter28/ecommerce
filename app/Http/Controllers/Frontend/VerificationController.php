<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if(!is_null($user)){
            $user->status= 1;
            $user->remember_token = NULL;
            session()->flash('success', 'Your account is activated. You can login now.');
            return redirect()->route('login', compact('user'));
        }else{
            session()->flash('errors', 'Sorry !! Your token is not matched!!');
        }
        return redirect('home');
    }
}
