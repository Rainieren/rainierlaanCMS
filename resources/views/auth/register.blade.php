@extends('layouts.layouts.portal')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6 shadow-lg d-flex flex-column justify-content-center" style="background-color: #0052CC !important;">
            <div class="row align-items-center">
                <div class="col-12 p-5">
                    <div class="login-info animated fadeInRight delay-05s show">
                        <h1>RainierlaanCMS</h1>
                        <h3>A simple CMS for the average user</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="height: 100vh; display: flex;flex-direction: column;justify-content: center;">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card shadow-lg border-0 animated fadeInUp delay-05s show"  style="border-radius: 20px">
                        <div class="card-body p-5">
                            <div class="header mb-5">
                                <h3 class="my-3">{{ __('Register') }}</h3>
                                <p class="sub-text">{{ __('Hello! Submit a register request and we will make your account up and running in notime. Already have an account?') }}
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" id="role_id" name="role_id" value="1">
                                <div class="form-group">
                                    <label for="firstname" class="">{{ __('First name') }}</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lastname">{{ __('Last name') }}</label>
                                    <input type="text" id="lastname" class="form-control" name="lastname">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Send request') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
