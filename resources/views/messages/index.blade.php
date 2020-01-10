@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
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
                        <a class="nav-link message my-2 " id="v-pills-message-{{ $message->id }}" data-toggle="pill" href="#v-pills-{{ $message->id }}" role="tab" aria-controls="v-pills-{{ $message->id }}" aria-selected="true">
                            <h5 class="m-0">{{ $message->firstname }} {{ $message->lastname }}</h5>
                            <p class="m-0">{{ $message->title }}</p>
                            <p class="sub-text m-0">{{ Str::limit($message->message, $length = 40, $end = '...') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach($messages as $message)
                    <div class="tab-pane fade" id="v-pills-{{ $message->id }}" role="tabpanel" aria-labelledby="v-pills-message-{{ $message->id }}">
                        <div class="message-header row">
                            <div class="col-8">
                                <h4 class="m-0">{{ $message->firstname }} {{ $message->lastname }}</h4>
                                <p class="m-0">{{ $message->title }}</p>
                                <p class="m-0 sub-text">{{ __('From:') }} {{$message->email}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <p class="sub-text m-0">{{ $message->created_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="message-content">
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
