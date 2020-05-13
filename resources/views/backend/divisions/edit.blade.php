@extends('backend.layouts.master')
@section('title')
    Edit Division | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Division Edit</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Division</h4>
                        <form action="{{route('admin.divisions.update',$division->id)}}" method="post"
                              class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Division Name</label>
                                <input type="text" class="form-control" name="name" value="{{$division->name}}"
                                       id="exampleInputEmail1" placeholder="Enter Division Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Priority</label>
                                <input type="number" class="form-control" name="priority" value="{{$division->priority}}" id="exampleInputEmail1"
                                       placeholder="Enter Division Title">
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
