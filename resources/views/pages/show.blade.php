<?php $layout = "layouts.layouts." . $page->layout->name; ?>

@extends($layout, ['header', $header])

@section('content')
    @foreach($blocks->sortBy('order') as $block)
        <div class="{{ $block->full_width == 1 ? 'fluid-container' : 'container' }}" id="app">
            {!!  $block->content !!}
        </div>
    @endforeach
@endsection
