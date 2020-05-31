@extends('backend.layouts.master')
@section('title')
    Orders | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">List of Orders</h4>
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone No</th>
                                    <th>Order Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key=>$order)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>#LE{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone_no}}</td>
                                    <td>
                                        <p>
                                            @if($order->is_seen_by_admin)
                                                <button type="button" class="btn btn-success btn-sm">Seen</button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                                            @endif
                                        </p>

                                        <p>
                                            @if($order->is_completed)
                                                <button type="button" class="btn btn-success btn-sm">Completed</button>
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm">Not Completed
                                                </button>
                                            @endif
                                        </p>

                                        <p>
                                            @if($order->is_paid)
                                                <button type="button" class="btn btn-success btn-sm">Paid</button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm">Unpaid</button>
                                            @endif
                                        </p>

                                    </td>

                                    <td>
                                        <a href="{{route('admin.orders.show', $order->id)}}"
                                           class="btn btn-info">View Order</a>
                                        <a href="#deleteModal{{$order->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                            Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('admin.orders.delete', $order->id)}}"
                                                          method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--end model--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone No</th>
                                    <th>Order Status</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
