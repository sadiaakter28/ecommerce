@if ($errors->any())
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger mt-1">
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
                <div class="alert alert-success mt-1">
                    <p>{{Session::get('success')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if(Session::has('sticky_error'))
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger mt-1">
                    <p>{{Session::get('sticky_error')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
