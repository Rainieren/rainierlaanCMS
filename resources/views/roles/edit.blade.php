@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit {{ $role->name }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form action="{{ route('update_role', ['name' => $role->name]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input name="name" type="text" class="form-control" placeholder="Role name" value="{{ $role->name }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Edit Role</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
