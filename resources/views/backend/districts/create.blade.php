@extends('backend.layouts.master')
@section('title')
    Create Districts | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">District</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add District</h4>
                        <form action="{{route('admin.districts.store')}}" method="post" class="forms-sample"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">District Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                       placeholder="Enter District Title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select a Division for the District</label>
                                <select class="form-control" name="division_id" id="exampleInputEmail1">
                                    <option value="">Please Select a Division for the District</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success mr-2">Add District</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
