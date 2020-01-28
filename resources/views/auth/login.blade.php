@extends('layouts.layouts.portal')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="d-none col-lg-6 shadow-lg d-lg-flex flex-column justify-content-center" style="background-color: #0052CC !important;">
            <div class="row align-items-center">
                <div class="col-12 p-5">
                    <div class="login-info animated fadeInRight delay-05s show">
                        <h1>RainierlaanCMS</h1>
                        <h3>A simple CMS for the average user</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12" style="height: 100vh; display: flex;flex-direction: column;justify-content: center;">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-12">
                    <div class="card shadow-lg border-0 animated fadeInUp delay-05s show" style="border-radius: 20px">
                        <div class="card-body p-5">
                            <div class="header mb-5">
                                <h3 class="my-3">{{ __('Login') }}</h3>
                                <p class="sub-text">{{ __('Hello! Let\'s get started.') }}</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="">
                                @csrf
                                <div class="form-group">
                                    <i class=""></i>
                                    <input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block br-5">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 my-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-1 text-center">
                                        @if (Route::has('password.request'))
                                            {{ __('Forgot password?') }}<a class="" href="{{ route('password.request') }}">
                                                {{ __('Reset here') }}
                                            </a>
                                        @endif
                                        <p>{{ __('No account yet?') }} <a href="{{ route('register') }}">{{ __('Submit a register request') }}</a></p>
                                    </div>
                                </div>
                            </form>
                            @isset($note)
                                {{ $note }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
