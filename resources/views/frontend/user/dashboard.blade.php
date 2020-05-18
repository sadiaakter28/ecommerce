@extends('frontend.user.master')
@section('title')
    Dashboard | Ecommerce
@endsection
@section('sub-content')

    <div class="container">
        <h2>Wellcome user {{$user->first_name . ' ' . $user->last_name}}</h2>
        <p>You can change your profile and every information here...</p>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body mt-2 pointer" onclick="location.href='{{route('user.profile')}}'">
                    <h4>Update profile</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
