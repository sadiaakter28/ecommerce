@extends('backend.layouts.master')
@section('title')
    Edit Product | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Product Edit</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>
                        <form action="{{route('admin.products.update',$product->id)}}" method="post" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" value="{{$product->title}}" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Product Title" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="3"  required>{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" value="{{$product->price}}" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter Product Price" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" value="{{$product->quantity}}" class="form-control" name="quantity" id="exampleInputEmail1" placeholder="Enter Product Price" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
