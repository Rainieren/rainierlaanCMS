@extends('layouts.layouts.portal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="header my-3">
                        <h3 class="text-center my-3">{{ __('Login') }}</h3>
                        <p>No account yet? Ask the administrator for privileges.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="">
                        @csrf


                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <label for="password" class="">{{ __('Password') }}</label>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <i class="fal fa-eye mr-2"></i><a href="#" class="showpassword"> Show</a>
                            </div>
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-info btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 my-3 d-flex justify-content-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 my-1 d-flex justify-content-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <small>©<?php echo date("Y"); ?> All Rights Reserved.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
