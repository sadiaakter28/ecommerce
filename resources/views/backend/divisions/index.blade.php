@extends('backend.layouts.master')
@section('title')
    Divisions | Ecommerce
@endsection
@section('main')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">List of Divisions</h4>
                        <a href="{{route('admin.divisions.create')}}" class="btn btn-success">Add Division</a>
                        <table class="table table-hover"  id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Division Name</th>
                                <th>Priority</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($divisions as $key=>$division)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$division->name}}</td>

                                    <td>{{$division->priority}}</td>
                                    <td>
                                        <a href="{{route('admin.divisions.edit',$division->id)}}"
                                           class="btn btn-success">Edit</a>
                                        <a href="#deleteModal{{$division->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>

                                        <!-- Modal HTML -->
                                        <div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1"
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
                                                    <form action="{{route('admin.categories.delete', $division->id)}}"
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
