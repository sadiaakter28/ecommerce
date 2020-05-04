@extends('backend.layouts.master')
@section('title')
    Categories | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List of Categories</h4>
                        <a href="{{route('admin.categories.create')}}" class="btn btn-success">Add Category</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <img src="{!! asset('images/categories/'.$category->image) !!}" width="50">
                                    </td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if($category->parent_id ==NULL)
                                            Primary Category
                                        @else{{$category->parent->name}}
                                        @endif
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('admin.categories.edit',$category->id)}}"
                                           class="btn btn-success">Edit</a>
                                        <a href="#deleteModal{{$category->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to
                                                            Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.categories.delete', $category->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Permanent
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
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