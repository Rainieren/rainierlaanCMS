@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        <a href="">
                            <img class="profile-image" src="{{ asset('/images/en_flag.png') }}" width="75" height="75">
                        </a>
                    </div>
                    <div class="col-md-10">
                        <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                        <p class="sub-text m-0">{{ $user->role->name }}</p>
                    </div>
                </div>
                <form action="{{ route('create_message') }}" method="POST">
                    @csrf
                    <div class="form-grouo row">
                        <div class="form-group col-6">
                            <label for="firstname">{{ __('Firstname') }}</label>
                            <input type="text" name="firstname" class="form-control" id="firstname">
                        </div>
                        <div class="form-group col-6">
                            <label for="lastname">{{ __('Lastname') }}</label>
                            <input type="text" name="lastname" class="form-control" id="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="message">{{ __('Message') }}</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Send form') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
