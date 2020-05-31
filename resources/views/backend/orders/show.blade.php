@extends('backend.layouts.master')
@section('title')
    Orders | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Order #LE{{$order->id}}</h4>
                    </div>
                    <div class="card-body">
                        <h3>Order Information</h3>
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <p><strong>Customer Name : </strong> {{$order->name}} </p>
                                <p><strong>Customer Phone : </strong> {{$order->phone_no}} </p>
                                <p><strong>Customer Email : </strong> {{$order->email}} </p>
                                <p><strong>Customer Shipping Address : </strong> {{$order->shipping_address}} </p>
                            </div>

                            <div class="col-md-6">
                                <p><strong>Order Payment Method : </strong> {{$order->payment->name}} </p>
                                <p><strong>Order Payment Transaction : </strong> {{$order->payment->transaction_id}}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <h3>Ordered Items:</h3>
                        @if($order->carts->count() > 0)

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
                                @foreach($order->carts as $key=>$cart)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>
                                            @if($cart->product->images->count() > 0)
                                                <img
                                                    src="{{asset('images/products/'.$cart->product->images->first()->image)}}"
                                                    style="width: 50px; height: 50px; border-radius: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('products.show', $cart->product->id)}}">
                                                {{$cart->product->title}}
                                            </a>
                                        </td>

                                        <td>
                                            <form class="form-inline" action="{{route('carts.update', $cart->id)}}}"
                                                  method="post">
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
                                            <form class="form-inline" action="{{route('carts.delete', $cart->id)}}}"
                                                  method="post">
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
                        @endif
                        <hr>
                        <form action="{{route('admin.orders.completed', $order->id)}}" method="post"
                              style="display: inline-block!important;">
                            @csrf
                            @if($order->is_completed)
                                <input type="submit" value="Cancel Order" class="btn btn-danger">
                            @else
                                <input type="submit" value="Complete Order" class="btn btn-success">
                            @endif
                        </form>

                        <form action="{{route('admin.orders.paid', $order->id)}}" method="post"
                              style="display: inline-block!important;">
                            @csrf
                            @if($order->is_paid)
                                <input type="submit" value="Cancel Payment" class="btn btn-danger">
                            @else
                                <input type="submit" value="Paid Order" class="btn btn-success">
                            @endif

                        </form>


                    </div>
                </div>
            </div>
        </div>
@endsection
