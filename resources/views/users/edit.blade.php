@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center my-5">
            <form action="" style="display: contents">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-3">
                        <img class="profile-image shadow-lg" src="{{ asset('/images/en_flag.png') }}" width="125" height="125" style="border: 3px solid #0052CC">
                    </div>
                    <div class="col-md-9">
                        <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                        <p class="m-0 sub-text">{{ $address->city }}, {{ $address->country->name }}</p>
                         {!! $user->activated === 1 ? "<small class=\"text-success\"><i class=\"far fa-check \"></i> Activated</small>" : "<small class=\"text-danger\"><i class=\"far fa-times\"></i> Not activated</small>" !!}
                    </div>
                </div>
            </div>
            <div class="col-md-7 my-5">
                    <div class="form-group row my-3">
                        <div class="col-5">
                            <label for="firstname">{{ __('Firstname') }}</label>
                            <input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}">
                        </div>
                        <div class="offset-1 col-5">
                            <label for="lastname">{{ __('Lastname') }}</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}">
                        </div>
                    </div>
                    <div class="form-group row my-5">
                        <div class="col-5">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        @if($user->isAdmin())
                        <div class="offset-1 col-5">
                            <label for="role">{{ __('Role') }}</label>
                            <select name="role" id="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach`
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row my-5">
                        <div class="col-5">
                            <label for="email">{{ __('Location') }}</label>
                            <input type="email" name="email" class="form-control" value="{{ $address->city }}, {{ $address->country->name }}" disabled>
                            <small class="sub-text">Change this by going to Account > Address book and click on the pencil to edit</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
