@extends('backend.layouts.master')

@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Category Edit</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Category</h4>
                        <form action="{{route('admin.categories.update',$category->id)}}" method="post"
                              class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{$category->name}}"
                                       id="exampleInputEmail1" placeholder="Enter Category Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="3"
                                          placeholder="Enter Category Description"
                                          required>{{$category->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent Category (Optional)</label>
                                <select class="form-control" name="parent_id" id="exampleInputEmail1">
                                    <option value="">Please Select a Primary Category</option>
                                    @foreach($main_categories as $cat)
                                        <option value="{{$cat->id}}"{{$cat->id == $category->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="oldimage">Category Old Image</label><br>
                                <img src="{!! asset('images/categories/'.$category->image) !!}" width="50">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category New Image</label>
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
