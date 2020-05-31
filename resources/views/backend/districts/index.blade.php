@extends('backend.layouts.master')
@section('title')
    Districts | Ecommerce
@endsection
@section('main')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">List of Districts</h4>
                        <a href="{{route('admin.districts.create')}}" class="btn btn-success">Add District</a>
                        <table class="table table-hover"  id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>District Name</th>
                                <th>Division Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($districts as $key=>$district)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$district->name}}</td>

                                    <td>{{$district->division->name}}</td>
                                    <td>
                                        <a href="{{route('admin.districts.edit',$district->id)}}"
                                           class="btn btn-success">Edit</a>
                                        <a href="#deleteModal{{$district->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>

                                        <!-- Modal HTML -->
                                        <div class="modal fade" id="deleteModal{{$district->id}}" tabindex="-1"
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
                                                    <form action="{{route('admin.districts.delete', $district->id)}}"
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
                                        {{--Model End--}}
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
