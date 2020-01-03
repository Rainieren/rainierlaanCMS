@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Messages') }}</h3>
            </div>
        </div>

        <div class="inbox row my-4">
            <div class="col-md-4">
                <div class="messages">
                    @foreach($messages as $message)
                        @if($message->read == 0)
                            <span class="read-dot"></span>
                        @endif
                        <form method="POST" action="{{ route('message_state', ['id' => $message->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <a href="#" id="message" class="message p-4 row">
                                <input type="hidden" id="message_id" value="{{ $message->id }}">
                                <div class="col-md-8">
                                    <h5 class="m-0 message-title">{{ $message->title }}</h5>
                                    <p class="m-0 message-short-text">{{ Str::limit($message->message, 40, $end='...') }}</p>
                                    <small class="message-author">Door: {{ $message->firstname }}</small>
                                </div>
                                <div class="col-md-4 text-right">
                                    <small class="message-date">{{ $message->created_at->toFormattedDateString() }}</small>
                                </div>
                            </a>
                            <hr>
                        </form>

                    @endforeach
                </div>
            </div>
            <div class="col-md-8">

{{--                <div class="message-full px-5">--}}
{{--                    <div class="message-header">--}}
{{--                        <h3>Titel bericht</h3>--}}
{{--                        <hr>--}}
{{--                        <p class="sub-text m-0">Van: Henk jan, email@email.com</p>--}}
{{--                        <hr>--}}
{{--                    </div>--}}
{{--                    <div class="message-content my-5">--}}
{{--                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A blanditiis dolore fugit hic ipsum magnam, minus nostrum temporibus voluptatum. Ab id, laboriosam libero nulla pariatur praesentium quaerat sunt suscipit veniam.</p>--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-primary">{{ __('Send a response back') }}</button>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>

    <script>
        $('#message').on('click', function() {
            $iden = $('#message_id').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/dashboard/message/' + $iden + '/state',
                type: 'PATCH',
                data: {"state": 1},
                success: function(data) {
                    alert("Hey het werkt");
                }
            });
        });
    </script>
@endsection
