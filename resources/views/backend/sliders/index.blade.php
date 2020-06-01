@extends('backend.layouts.master')
@section('title')
    Sliders | Ecommerce
@endsection
@section('main')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="card-title">List of Sliders</h4>
                        <a href="#addSliderModal" class="btn btn-success" data-toggle="modal">
                            Add Slider
                        </a>
                        <!--Add Slider Modal HTML -->
                        <div class="modal fade" id="addSliderModal" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.sliders.store')}}"
                                              method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <lebel for="title"> Slider Title <small
                                                        class="text-danger">(required)</small></lebel>
                                                <input type="text" class="form-control" name="title" id="title"
                                                       placeholder="Slider Title" required>
                                            </div>

                                            <div class="form-group">
                                                <lebel for="image"> Slider Image
                                                    <small class="text-danger">(required)</small></lebel>
                                                <input type="file" class="form-control" name="image" id="image"
                                                       placeholder="Slider Image" required>
                                            </div>

                                            <div class="form-group">
                                                <lebel for="button_text"> Slider Button Text <small class="text-info">(Optional)</small>
                                                </lebel>
                                                <input type="text" class="form-control" name="button_text"
                                                       id="button_text"
                                                       placeholder="Slider Button Text (If need)" >
                                            </div>

                                            <div class="form-group">
                                                <lebel for="button_link"> Slider Button Link <small class="text-info">(Optional)</small>
                                                </lebel>
                                                <input type="url" class="form-control" name="button_link"
                                                       id="button_link"
                                                       placeholder="Slider Button Link (If need)" >
                                            </div>

                                            <div class="form-group">
                                                <lebel for="priority"> Slider Priority <small class="text-info">(required)</small>
                                                </lebel>
                                                <input type="number" class="form-control" name="priority" id="priority"
                                                       placeholder="Slider Priority; e.g: 10" value="10" required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-success">Add New Slider</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--Model End--}}
                        <table class="table table-hover" id="dataTable">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Slider Priority</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>
                                        <img src="{{asset('images/sliders/'.$slider->image)}}" width="50">

                                    </td>
                                    <td>{{$slider->priority}}</td>

                                    <td>
                                        <a href="#editSliderModal{{$slider->id}}"
                                           class="btn btn-success" data-toggle="modal">Edit</a>
                                        <!--Edit Slider Modal HTML -->
                                        <div class="modal fade" id="editSliderModal{{$slider->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            Slider</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.sliders.update', $slider->id)}}"
                                                              method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <lebel for="title"> Slider Title <small
                                                                        class="text-danger">(required)</small></lebel>
                                                                <input type="text" class="form-control" name="title"
                                                                       id="title" placeholder="Slider Title"
                                                                       value="{{$slider->title}}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <lebel for="image"> Slider Image
                                                                    <a href="{{asset('images/sliders/'.$slider->image)}}" target="_blank">
                                                                        Previous Image
                                                                    </a>
                                                                    <small class="text-danger">(required)</small></lebel>
                                                                <input type="file" class="form-control" name="image"
                                                                       id="image" placeholder="Slider Image">
                                                            </div>

                                                            <div class="form-group">
                                                                <lebel for="button_text"> Slider Button Text <small
                                                                        class="text-info">(Optional)</small></lebel>
                                                                <input type="text" class="form-control"
                                                                       name="button_text" id="button_text"
                                                                       placeholder="Slider Button Text (If need)"
                                                                       value="{{$slider->button_text}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <lebel for="button_link"> Slider Button Link <small
                                                                        class="text-info">(Optional)</small></lebel>
                                                                <input type="url" class="form-control"
                                                                       name="button_link" id="button_link"
                                                                       placeholder="Slider Button Link (If need)"
                                                                       value="{{$slider->button_link}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <lebel for="priority"> Slider Priority <small
                                                                        class="text-info">(required)</small></lebel>
                                                                <input type="number" class="form-control"
                                                                       name="priority" id="priority"
                                                                       placeholder="Slider Priority; e.g: 10"
                                                                       value="{{$slider->priority}}" required>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-success">Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{--Model End--}}

                                        <a href="#deleteModal{{$slider->id}}" data-toggle="modal"
                                           class="btn btn-danger">Delete</a>
                                        <!-- Delete Modal HTML -->
                                        <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1"
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
                                                    <form action="{{route('admin.sliders.delete', $slider->id)}}"
                                                          method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
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
