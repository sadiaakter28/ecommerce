@extends('frontend.layouts.master')
@section('title')
    Checkouts | Ecommerce
@endsection
@section('main')
    <div class="container margin-top-20">
        <div class="card card-body">
            <h4 class="card-title">Confirm Items</h4>
            <hr>
            <div class="row">
                <div class="col-md-7 border-right">
                    @foreach((new App\Models\Cart)->totalCarts() as $key=>$cart)
                        <p>
                            {{$cart->product->title}} - <strong>{{$cart->product->price}} Taka</strong>
                            - {{$cart->product_quantity}} item
                        </p>
                    @endforeach
                </div>

                <div class="col-md-5">
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach((new App\Models\Cart)->totalCarts() as $key=>$cart)
                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                    @endforeach
                    <p>Total Price : <strong>{{$total_price}}</strong> Taka</p>
                    <p>Total Price with shipping cost :
                        <strong>{{$total_price + App\Models\Setting::first()->shipping_cost}}</strong>
                        Taka
                    </p>
                </div>
            </div>
            <p>
                <a href="{{route('carts')}}"> Change Cart Items </a>
            </p>
        </div>

        <div class="card card-body mt-2">
            <h4 class="card-title">Shipping Address</h4>
            <form method="POST" action="{{ route('checkouts.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                    <div class="col-md-6">
                        <input name="name" id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ Auth::check() ? Auth::user()->first_name . '' .Auth::user()->last_name : ''}}"
                               required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input name="email" id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ Auth::check() ? Auth::user()->email : ''}}"
                               required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number"
                           class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input name="phone_number" id="phone_number" type="text"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               value="{{ Auth::check() ? Auth::user()->phone_number : ''}}" required
                               autocomplete="phone_number" autofocus>

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="message"
                           class="col-md-4 col-form-label text-md-right">{{ __('Additional Message(Optional)') }}</label>

                    <div class="col-md-6">
                        <textarea name="message" id="message" type="text" rows="3"
                                  class="form-control @error('message') is-invalid @enderror"
                                  autocomplete="message" autofocus></textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="shipping_address"
                           class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                    <div class="col-md-6">
                        <textarea name="shipping_address" id="shipping_address" type="text" rows="3"
                                  class="form-control @error('shipping_address') is-invalid @enderror"
                                  autocomplete="shipping_address"
                                  autofocus> {{ Auth::check() ? Auth::user()->shipping_address : ''}} </textarea>

                        @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_method"
                           class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                    <div class="col-md-6">
                        <select id="payments" class="form-control @error('payment_method') is-invalid @enderror"
                                name="payment_method_id" required>
                            <option value="">Please select a Payment Method</option>
                            @foreach($payments as $payment)
                                <option value="{{$payment->short_name}}"> {{$payment->name}} </option>
                            @endforeach
                        </select>
                        @foreach($payments as $payment)

                            @if($payment->short_name == "cash_in")
                                <div id="payment_{{$payment->short_name}}" class="alert alert-success mt-2 hidden">
                                    <h3>
                                        For cash in there is nothing necessary. Just click finish order.
                                        <br>
                                        <small>
                                            You will get your product in two or three business days.
                                        </small>
                                    </h3>
                                </div>
                            @else
                                <div id="payment_{{$payment->short_name}}" class="alert alert-success mt-2 hidden">
                                    <h3>{{$payment->name}}</h3>
                                    <p>
                                        <strong>{{$payment->name}} No : {{$payment->no}}</strong>
                                        <br>
                                        <strong>Account type : {{$payment->type}}</strong>
                                    </p>
                                    <div class="alert alert-success">
                                        Please send the above money to this Bkash No. & write your transaction code
                                        bellow there..
                                    </div>

                                </div>

                            @endif
                        @endforeach
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">

                        @error('payment_method')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Order Now') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#payments").change(function () {
            $payment_method = $("#payments").val();
            if ($payment_method == "cash_in") {
                $("#payment_cash_in").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
            } else if ($payment_method == "bkash") {
                $("#payment_bkash").removeClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#payment_rocket").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            } else if ($payment_method == "rocket") {
                $("#payment_rocket").removeClass('hidden');
                $("#payment_bkash").addClass('hidden');
                $("#payment_cash_in").addClass('hidden');
                $("#transaction_id").removeClass('hidden');
            }
        })
    </script>
@endsection
