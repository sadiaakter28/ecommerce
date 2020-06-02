@extends('backend.adminProfile.master')
@section('title')
    Dashboard | Ecommerce
@endsection
@section('sub-content')

    <div class="container">
        <div class="card-body mb-5">
            <form method="POST" action="{{ route('admin.profile.update',$user->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input name="name" id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
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
                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input name="phone_no" id="phone_no" type="text"
                               class="form-control @error('phone_no') is-invalid @enderror"
                               value="{{ $user->phone_no }}" required autocomplete="phone_no" autofocus>

                        @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="oldimage" class="col-md-4 col-form-label text-md-right">{{ __('User Old Image') }}</label>

                    <div class="col-md-6">
                        <img src="{!! asset('images/admins/'.$user->avatar) !!}"
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

@endsection
