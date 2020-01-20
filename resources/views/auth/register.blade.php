@extends('layouts.layouts.portal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center p-4">
                    <h2>{{ __('Submit a register request') }}</h2>
                    <p class="sub-text">{{ __('To have access to our system you will have to submit a register request. A response can be expected with 1-2 days.') }}</p>

                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" id="role_id" name="role_id" value="1">

                        <div class="form-group row">
                            <div class="col">
                                <label for="firstname" class="">{{ __('First name') }}</label>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Your first name" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="lastname">{{ __('Last name') }}</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Your last name" name="lastname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" placeholder="e.g. example@outlook.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea name="reason" class="form-control" id="reason" cols="30" rows="10" placeholder="Why would you want access to our system?"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
@endsection
