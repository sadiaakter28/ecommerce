@extends('backend.layouts.master')

@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Products</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product</h4>
                        <form action="{{route('admin.products.store')}}" method="post" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Product Title" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="3" placeholder="Enter Product Title" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter Product Price" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" placeholder="Enter Product Price" required>
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
                            <button type="submit" class="btn btn-success mr-2">Add Product</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
