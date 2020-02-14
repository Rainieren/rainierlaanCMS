@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Messages') }}</h3>
            </div>
        </div>
        @if(count($messages) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>{{ __('Your inbox is empty. Come back another time') }}</p>
                </div>
            </div>
        @else
        <div class="row my-5">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($messages as $message)
                        <a class="nav-link message p-3" id="v-pills-message-{{ $message->id }}" data-toggle="pill" href="#v-pills-{{ $message->id }}" role="tab" aria-controls="v-pills-{{ $message->id }}" aria-selected="true">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="m-0">{{ $message->firstname }} {{ $message->lastname }}</h5>
                                        </div>
                                        <div class="col-4">
                                            <small class="m-0 sub-text">{{ $message->created_at->toFormattedDateString() }}</small>
                                        </div>
                                        <div class="col-12">
                                            <p class="m-0">{{ $message->title }}</p>
                                        </div>
                                    </div>


{{--                                    <p class="sub-text m-0">{{ Str::limit($message->message, $length = 48, $end = '...') }}</p>--}}
                                </div>
                            </div>
                        </a>
                        <div class="line"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach($messages as $message)
                    <div class="tab-pane fade" id="v-pills-{{ $message->id }}" role="tabpanel" aria-labelledby="v-pills-message-{{ $message->id }}">
                        <div class="message-header">
                            <div class="row">
                                <div class="col-8">
                                    <h1>{{ $message->title }}</h1>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-center">
    {{--                                <p class="sub-text m-0">{{ $message->created_at->toFormattedDateString() }}</p>--}}
                                    <a class="" href="{{ route('delete_message', ['id' => $message->id]) }}"
                                       onclick="event.preventDefault(); document.getElementById('delete-form{{$message->id}}').submit();">
                                        <i class="fal fa-trash-alt text-danger"></i>
                                        <form id="delete-form{{$message->id}}" action="{{ route('delete_message', ['id' => $message->id]) }}"
                                              method="POST"
                                              class="d-none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="message-content">
                            <div class="row my-3">
                                <div class="col-8">
                                    <h2 class="">{{ $message->title }}</h2>
                                </div>
                                <div class="col-4 justify-content-end x d-flex align-items-center">
                                    <p class="m-0 sub-text">{{ $message->created_at->toFormattedDateString() }}</p>
                                </div>
                            </div>

                            <p>{{ $message->message }}</p>
                            <div class="form-group my-4">
                                <a href="mailto:{{ $message->email}}?subject={{ $message->title }} " class="btn btn-primary">{{ __('Send message back') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
