@extends('backend.layouts.master')
@section('title')
    Products | Ecommerce
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body  table-responsive">
                        <h4 class="card-title">List of Products</h4>
                        <a href="{{route('admin.products.create')}}" class="btn btn-success">Add Product</a>

                                    <table class="table table-hover" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Code</th>
                                            <th>Product Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $key=>$product)
                                            <tr>
                                                <td>#PLE{{$product->id}}</td>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>
                                                    <img src="{{asset('images/products/' . $product->product_image)}}"
                                                         width="50">
                                                </td>
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->brand->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>
                                                    <a href="{{route('admin.products.edit',$product->id)}}"
                                                       class="btn btn-success">Edit</a>
                                                    <a href="#deleteModal{{$product->id}}" data-toggle="modal"
                                                       class="btn btn-danger">Delete</a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1"
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
                                                                <form action="{{route('admin.products.delete', $product->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancel
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">Delete</button>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
