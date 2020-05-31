@extends('frontend.layouts.master')
@section('title')
    Carts | Ecommerce
@endsection
@section('main')
    <div class="container">
        <h4 class="card-title">My Carts Items</h4>
        @if((new App\Models\Cart)->totalItems() > 0)
            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Image</th>
                        <th>Product Title</th>
                        <th>Product Quantity</th>
                        <th>Unit Price</th>
                        <th>Sub-total Price</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total_price = 0;
                    @endphp
                    @foreach((new App\Models\Cart)->totalCarts() as $key=>$cart)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td>
                                @if($cart->product->images->count() > 0)
                                    <img src="{{asset('images/products/'.$cart->product->images->first()->image)}}"
                                         style="width: 50px; height: 50px; border-radius: 50px;">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('products.show', $cart->product->id)}}">
                                    {{$cart->product->title}}
                                </a>
                            </td>

                            <td>
                                <form class="form-inline" action="{{route('carts.update', $cart->id)}}}" method="post">
                                    @csrf
                                    <input type="number" name="product_quantity"
                                           class="form-control" value="{{$cart->product_quantity}}">
                                    <button type="submit" class="btn btn-success ml-2">Update</button>
                                </form>
                            </td>

                            <td>
                                {{$cart->product->price}}taka
                            </td>

                            <td>
                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp
                                {{$cart->product->price * $cart->product_quantity}}taka
                            </td>

                            <td>
                                <form class="form-inline" action="{{route('carts.delete', $cart->id)}}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cart_id"
                                           class="form-control" value="{{$cart->product_quantity}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <strong>Total Amount</strong>

                        </td>
                        <td colspan="2">
                            <strong>{{$total_price}} Taka </strong>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="float-right">
                    <a href="{{route('products.index')}}" class="btn btn-info btn-lg">Continue Shopping...</a>
                    <a href="{{route('checkouts')}}" class="btn btn-warning btn-lg">Checkout</a>
                </div>
            </div>
        @else
            <div class="alert alert-success mt-3">
                <strong>There is no item in your cart..</strong>
                <br>
                <a href="{{route('products.index')}}" class="btn btn-info btn-lg">Continue Shopping...</a>
            </div>
        @endif
    </div>
@endsection
