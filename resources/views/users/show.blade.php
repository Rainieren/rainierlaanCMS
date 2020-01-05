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

            </div>
        </div>
    </div>
@endsection
