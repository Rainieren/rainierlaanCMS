@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Create a block') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store_block') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="page">{{ __('Choose a page') }}</label>
                        <select name="page" class="form-control  @error('page') is-invalid @enderror">
                            <option value="" selected>{{ __('None') }}</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                            @endforeach
                        </select>
                        @error('page')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">Status</label>
                        <select class="form-control" name="status" id="page-select">
                            <option value="1" selected>{{ __('Enabled') }}</option>
                            <option value="0">{{ __('Disabled') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control  @error('content') is-invalid @enderror" id="content" cols="30" rows="10">
                            {{ old('content') }}
                        </textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Create block') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
