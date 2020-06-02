@extends('backend.layouts.master')
@section('title')
    Edit User | Ecommerce
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">User Edit</h4>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <form method="POST" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input name="first_name" id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}" required autocomplete="name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input name="last_name" id="last_name" type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ $user->last_name }}" required autocomplete="name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input name="username" id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror"
                                           value="{{ $user->username }}" required autocomplete="name" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input name="email" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input name="password" id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                <div class="col-md-6">
                                    <input name="password_confirmation" id="password-confirm" type="password"
                                           class="form-control" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input name="phone_number" id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('division_id') is-invalid @enderror" name="division_id" required>
                                        <option value="">Please select your division</option>
                                        @foreach($divisions as $division)
                                            <option value="{{$division->id}}"
                                                {{$user->division_id == $division->id ? 'selected' : ''}} >
                                                {{$division->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district_id" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" required>
                                        <option value="">Please select your District</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" {{$user->district_id == $district->id ? 'selected' : ''}} >
                                                {{$district->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

                                <div class="col-md-6">
                                    <input name="street_address" id="street_address" type="text"
                                           class="form-control @error('street_address') is-invalid @enderror"
                                           value="{{ $user->street_address }}" required autocomplete="phone_number" autofocus>

                                    @error('street_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                                <div class="col-md-6">
                        <textarea name="shipping_address" id="shipping_address" type="text" rows="3"
                                  class="form-control @error('shipping_address') is-invalid @enderror"
                                  autocomplete="shipping_address" autofocus> {{$user->shipping_address}} </textarea>

                                    @error('shipping_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="oldimage" class="col-md-4 col-form-label text-md-right">{{ __('User Old Image') }}</label>

                                <div class="col-md-6">
                                    <img src="{!! asset('images/users/'.$user->avatar) !!}"
                                         style="height: 100px;width: 100px; border-radius: 50px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('User Image') }}</label>

                                <div class="col-md-6">
                                    <input name="avatar" id="avatar" type="file"
                                           class="form-control @error('avatar') is-invalid @enderror"
                                           value="{{ $user->avatar }}" autocomplete="avatar" autofocus>

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
