<?php $layout = "layouts.layouts." . $page->layout->name; ?>
@extends($layout)

@section('content')
    @foreach($blocks->sortBy('order') as $block)
        {!!  $block->content !!}
    @endforeach
@endsection
