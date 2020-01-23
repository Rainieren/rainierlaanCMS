@extends('layouts.layouts.portal')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 shadow-lg d-flex flex-column justify-content-center" style="background-color: #0052CC !important;">
            <div class="row align-items-center">
                <div class="col-12 p-5">
                    <div class="login-info fadeInRight">
                        <h1>RainierlaanCMS</h1>
                        <h3>A simple CMS for the average user</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="height: 100vh; display: flex;flex-direction: column;justify-content: center;">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card shadow-lg border-0 fadeInUp" style="border-radius: 20px">
                        <div class="card-body p-5">
                            <div class="header mb-3">
                                <h3 class="my-3">{{ __('Reset Password') }}</h3>
                                <p class="sub-text">{{ __('Hello! Let\'s get you up and running again. Suddenly remembered your password again? ') }}
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Send Password Reset Link') }}
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
