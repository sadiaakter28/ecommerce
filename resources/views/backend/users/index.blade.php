@extends('backend.layouts.master')
@section('title')
    Users | Ecommerce
@endsection
@section('main')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">List of Users</h4>

                        <table class="table table-hover"  id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>User Image</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Street Address</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Shipping Address</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>
                                        <img src="{{asset('images/users/'.$user->avatar)}}" width="50">
                                    </td>
                                    <td>{{$user->first_name . ' ' . $user->last_name}}</td>

                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->street_address}}</td>
                                    <td>{{$user->division->name}}</td>
                                    <td>{{$user->district->name}}</td>
                                    <td>{{$user->shipping_address}}</td>
                                    <td>
                                        @if($user->status==1)
                                            <em class="badge badge-primary">Active</em>
                                        @else
                                            <em class="badge badge-danger">Inactive</em>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.users.edit',$user->id)}}"
                                           class="btn btn-success">Edit</a>
                                        <a href="#deleteModal{{$user->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1"
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
                                                    <form action="{{route('admin.users.delete', $user->id)}}"
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

@endsection
