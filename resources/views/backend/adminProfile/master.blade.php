@extends('backend.layouts.master')
@section('title')
    Dashboard | Ecommerce
@endsection
@section('main')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="" class="list-group-item ">
                        <img src="{{asset('images/admins/'.$user->avatar)}}"
                             class="img rounded-circle" style="height: 150px; width: 150px;" alt="">
                    </a>

                    <a href="{{route('admin.profile.dashboard')}}"
                       class="list-group-item {{Route::is('admin.profile.dashboard') ? 'active' : ''}}">Dashboard</a>
                    <a href="{{route('admin.profile.show')}}"
                       class="list-group-item {{Route::is('admin.profile.show') ? 'active' : ''}}">Update Profile</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-body">
                    @yield('sub-content')
                </div>
            </div>
        </div>
    </div>

@endsection
