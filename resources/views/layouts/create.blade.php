@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Create new layout') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store_layout') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content" class="content">{{ __('Content') }}</label>
                        <textarea name="content" id="" class="form-control  @error('content') is-invalid @enderror" cols="30" rows="10">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Create layout') }}</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
