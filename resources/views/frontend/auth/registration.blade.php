@extends('frontend.layouts.master')
@section('title')
    Registration | Ecommerce
@endsection
@section('main')
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('registration') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input name="first_name" id="first_name" type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}" required autocomplete="name" autofocus>

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
                                           value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                    @error('last_name')
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
                                           class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                           required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input name="password" id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" required
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input name="password_confirmation" id="password-confirm" type="password" class="form-control" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input name="phone_number" id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

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
                                            <option value="{{$division->id}}"> {{$division->name}} </option>
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
                                            <option value="{{$district->id}}"> {{$district->name}} </option>
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
                                           value="{{ old('street_address') }}" required autocomplete="phone_number" autofocus>

                                    @error('street_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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

