@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Create a page') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store_page') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" id="url" name="url" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="page-select">
                            <option value="1" selected>{{ __('Enabled') }}</option>
                            <option value="0">{{ __('Disabled') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="layout">{{ __('Layout') }}</label>
                        <select name="layout" id="layout" class="form-control @error('layout') is-invalid @enderror" value="{{ old('layout') }}">
                            <option value="" selected>{{ __('Choose a layout...') }}</option>
                            @foreach($layouts as $layout)
                                <option value="{{ $layout->id }}">{{ $layout->name }}</option>
                            @endforeach
                        </select>
                        @error('layout')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">{{ __('Has parent page') }}</label>
                        </div>
                    </div>
                    <div id="sub-page-select" class="form-group" style="display: none">
                        <label for="sub_page">{{ __('Page') }}</label>
                        <select name="sub_page" id="" class="form-control">
                            <option value="0" selected>{{ __('No page') }}</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Create page') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
