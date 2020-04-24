@extends('backend.layouts.master')
@section('title')
    Edit Brand | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Brand Edit</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Brand</h4>
                        <form action="{{route('admin.brands.update',$brand->id)}}" method="post"
                              class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" class="form-control" name="name" value="{{$brand->name}}"
                                       id="exampleInputEmail1" placeholder="Enter Brand Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="3"
                                          placeholder="Enter Brand Description"
                                          required>{{$brand->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="oldimage">Brand Old Image</label><br>
                                <img src="{!! asset('images/brands/'.$brand->image) !!}" width="50">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand New Image</label>
                                <input type="file" class="form-control" name="image" id="exampleInputEmail1">
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
