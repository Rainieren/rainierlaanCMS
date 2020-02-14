@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Edit') }} {{ $page->name }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('update_post', ['url' => $page->url]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{$page->name}}">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" class="form-control" value="{{$page->url}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="page-select">
                            <option value="1" {{ $page->status == 1 ? "selected" : "" }}>{{ __('Enabled') }}</option>
                            <option value="0" {{ $page->status == 0 ? "selected" : "" }}>{{ __('Disabled') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="layout">{{ __('Layout') }}</label>
                        <select name="layout" id="" class="form-control">
                            <option value="0" selected>{{ __('Default') }}</option>
                            @foreach($layouts as $layout)
                                <option value="{{ $layout->id }}"  {{ $page->layout_id == $layout->id ? "selected" : "" }}>{{ $layout->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing" {{ $page->page_id != 0 ? "checked" : "" }}>
                            <label class="custom-control-label" for="customControlAutosizing">{{ __('Has parent page') }}</label>
                        </div>
                    </div>
                    <div id="sub-page-select" class="form-group" style="{{ $page->page_id != 0 ? "display: block" : "display: none" }}">
                        <input type="hidden" name="page_id" id="page_id" value="{{ $page->page_id }}">
                        <label for="sub_page">{{ __('Page') }}</label>
                        <select name="sub_page" id="sub_page" class="form-control">
                            <option name="no_page" id="no_page" value="0">{{ __('No page') }}</option>
                            {{ $cur_page = $page }}
                            @foreach($pages as $sub_page)
                                <option value="{{ $sub_page->id }}" {{ $cur_page->page_id == $sub_page->id ? "selected" : "" }}>{{ $sub_page->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Save page') }}</button>
                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                @if(count($blocks) == 0)
                    <h3 class="text-center">{{ __('This page has no blocks.') }}</h3>
                    <p class="text-center">{{ __('Add blocks to this page to rearrange the order.') }}</p>
                @else
                    <div class="form-group">
                        <h3>{{ __('This page has') }} {{ count($blocks) }} {{ __('blocks.') }}</h3>
                        <p>{{ __('To rearrange the order of the blocks as they appear on the page, simply drag and drop them in the desired order.') }}</p>
                        <div class="block-order-list">
                            @foreach($blocks->sortBy('order') as $block)
                                <div class="list-group-item" data-id="{{ $block->id }}"><i class="far fa-arrows handle mr-3"></i> {{$block->name}} @if($block->status == 0) <small class="text-danger">{{ __('Disabled') }}</small> @endif</div>
                            @endforeach
                        </div>
                        <input type="text" value="{{ $page->url }}" hidden id="page-url">
                    </div>
                    <small class="saved-message text-success" style="display: none">The order has been saved!</small>
                @endif
            </div>
        </div>
    </div>
@endsection


