<?php $layout = "layouts.layouts." . $page->layout->name; ?>
@extends($layout)

@section('content')
    @foreach($blocks->sortBy('order') as $block)
        <div class="{{ $block->full_width == 1 ? 'fluid-container' : 'container' }}" id="app" style="background: #f4f4f4">
            {!!  $block->content !!}
        </div>
    @endforeach
@endsection
