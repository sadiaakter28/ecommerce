@extends('backend.adminProfile.master')
@section('title')
    Dashboard | Ecommerce
@endsection
@section('sub-content')

    <div class="container">
        <h2>{{$user->name}} Welcome to your Admin Profile</h2>
        <p>You can change your profile and every information here...</p>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body mt-2 pointer" onclick="location.href='{{route('admin.profile.show')}}'">
                    <a href="{{route('admin.profile.show')}}">
                        <h4>Update profile</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
