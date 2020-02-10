@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Add a new role</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form action="{{ route('store_role') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Role name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Add Role</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
