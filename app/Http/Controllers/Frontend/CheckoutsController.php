<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.checkouts.index', compact('payments'));
    }
}
