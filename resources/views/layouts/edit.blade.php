@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Edit') }} {{ $layout->name }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('update_layout', ['id' => $layout->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $layout->name }}">
                    </div>
                    <div class="form-group">
                        <label for="content" class="content">{{ __('Content') }}</label>
                        <textarea name="content" id="" class="form-control" cols="50" rows="20">{{ $layout->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="edit" value="edit">{{ __('Edit layout') }}</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-link" name="edit" value="continue">Save and continue editing</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
