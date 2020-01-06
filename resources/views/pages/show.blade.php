<?php $layout = "layouts.layouts." . $page->layout->name; ?>
@extends($layout)

@section('content')
    @foreach($blocks->sortBy('order') as $block)
        {{  Blade::compile-String($block->content) }}
    @endforeach
@endsection
