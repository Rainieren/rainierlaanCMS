@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Notifications') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-3">
                <div class="nav flex-column nav-pills border p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link position-relative" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        {{ __('Unread') }}
                        @if($user->unreadNotifications->count() == 0)
                            <span class="badge badge-light" style="position: absolute; right: 10px">{{ $user->unreadNotifications->count() }}</span>
                        @else
                            <span class="badge badge-danger" style="position: absolute; right: 10px">{{ $user->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <a class="nav-link position-relative" id="v-pills-profile-tab read" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        {{ __('Read') }} <span class="badge badge-light" style="position: absolute; right: 10px">{{ $user->readNotifications->count() }}</span>
                    </a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @foreach($user->unreadNotifications as $notification)
                            <div class="notification p-2 row">
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    {!! $notification->data['icon']  !!}
                                </div>
                                <div class="col-10">
                                    <p class="m-0"><span class="font-weight-bold">{{ $notification->data['author']}}</span> {!! __($notification->data['message']) !!}</p>
                                    <small>{{ $notification->data['created_at'] }}</small>
                                </div>

                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        @foreach($user->readNotifications as $notification)
                            <div class="notification p-2 row">
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                    {!! $notification->data['icon']  !!}
                                </div>
                                <div class="col-10">
                                    <p class="m-0"><span class="font-weight-bold">{{ $notification->data['author']}}</span> {!! __($notification->data['message']) !!}</p>
                                    <small>{{ $notification->data['created_at'] }}</small>
                                </div>
                                <div class="col-1 d-flex justify-content-center">
                                    <input type="hidden" class="notification-id" name="id" value="{{ $notification->id }}">
                                    <a href="#" id="delete-notification"><i class="far fa-times-circle fa-lg"></i></a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#v-pills-home-tab').on('click', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('read_notifications') }}',
                type: 'POST',
                data: [],
                success: function(data){

                }
            })
        });

        $('#delete-notification').on('click', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'dashbboard/notification/' + $('.notification-id').val() + '/delete',
                type: 'DELETE',
                data: [],
                success: function(data){

                }
            })
        });


    </script>
@endsection
