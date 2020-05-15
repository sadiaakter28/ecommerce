@if ($errors->any())
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success'))
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success">
                    <p>{{Session::get('success')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('errors'))
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <p>{{Session::get('errors')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
