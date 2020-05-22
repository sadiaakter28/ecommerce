<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Auth;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.checkouts.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone_number' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required',
        ]);

        $order = new Order();
        //check transaction id is given or not
        if ($request->payment_method_id !='cash_in'){
            if ($request->transaction_id == NULL || empty($request->transaction_id)){
                session()->flash('sticky_error', 'Please give transaction ID for your payment');
                return back();
            }
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transaction_id = $request->transaction_id;
        $order->ip_address = request()->ip();

        if (Auth::check()){
            $order->user_id = Auth::id();
        }
        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
        $order->save();

        foreach ((new \App\Models\Cart)->totalCarts() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }

        session()->flash('success', 'Your order has taken successfully!! Please wait admin will soon confirm it');
        return redirect()->route('home');
    }
}
