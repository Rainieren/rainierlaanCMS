@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Edit') }} {{ $block->name }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('update_block', ['identifier' => $block->identifier]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$block->name}}">
                    </div>
                    <div class="form-group">
                        <label for="page-select">{{ __('Choose a page') }}</label>
                        <select name="page" class="form-control" id="page-select">
                            <option value="" selected>{{ __('None') }}</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}" {{ ( $block->page->id == $page->id) ? 'selected' : '' }}>{{ $page->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">Status</label>
                        <select class="form-control" name="status" id="page-select">
                            <option value="1" {{ ($block->status == 1) ? 'selected' : '' }}>{{ __('Enabled') }}</option>
                            <option value="0" {{ ($block->status == 0) ? 'selected' : '' }}>{{ __('Disabled') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ $block->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Save block') }}</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
