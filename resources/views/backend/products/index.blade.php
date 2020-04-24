@extends('backend.layouts.master')
@section('title')
    Products | Ecommerce
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Products</h4>
                        <a href="{{route('admin.products.create')}}" class="btn btn-success">Add Product</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <img src="{!! asset('images/products/'.$product->product_image) !!}" width="50">
                                    </td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-success">Edit</a>
                                        <a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.products.delete', $product->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--end model--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
