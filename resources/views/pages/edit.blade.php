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
                <form method="POST" action="{{ route('store_page') }}">
                    @csrf
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
                            <option value="1" selected>{{ __('Enabled') }}</option>
                            <option value="0">{{ __('Disabled') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="layout">{{ __('Layout') }}</label>
                        <select name="layout" id="" class="form-control">
                            <option value="" selected>{{ __('Default') }}</option>
                            <?php
                            $dir = "../resources/views/layouts";
                            $list = scandir($dir,1);
                            $newlist = array_splice($list, -2);

                            foreach ($list as $item)
                                print "<option value='" . strtok($item, '.') ."'>" . strtok($item, '.') . "</option>";
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Save page') }}</button>
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
                        <div class="block-order-list" >
                            @foreach($blocks->sortBy('order') as $block)
                                <div class="list-group-item" data-id="{{ $block->id }}"><i class="far fa-arrows handle mr-3"></i> {{$block->name}}</div>
                            @endforeach
                        </div>
                    </div>
                    <small class="saved-message text-success" style="display: none">The order has been saved!</small>
                @endif
            </div>

        </div>
    </div>

    <script>
        $('.block-order-list').sortable({
            animation: 150,
            handle: '.handle',
            store: {
                set: function (sortable) {
                    let order = {};
                    $('.list-group-item').each(function() {
                        order[$(this).data('id')] = $(this).index();
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('change_order', ['url', $page->url]) }}',
                        type: 'POST',
                        data: {order: order},
                        success: function(data){
                            $('.saved-message').fadeIn();
                            setTimeout(function() {
                                $('.saved-message').fadeOut();
                            }, 1000);
                        }
                    })
                }
            }
        });
    </script>
@endsection


