@extends('layouts.layouts.backend')

@section('content')
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-12">
            @if(date("H") >= 0 && date("H") < 12)
                <h3>{{ __('Good morning,') }} {{ Auth::user()->firstname }} <i class="fas fa-sun-haze color-primary fa-2x"></i></h3>
            @elseif(date("H") >= 12 && date("H") < 18)
                <h3>{{ __('Good afternoon,') }} {{ Auth::user()->firstname }} <i class="fas fa-sun text-warning fa-2x"></i></h3>
            @else
                <h3>{{ __('Good evening,') }} {{ Auth::user()->firstname }} <i class="fas fa-moon-cloud fa-2x"></i></h3>
            @endif
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card p-4 card-grey fadeInUp mb-3">
                <div class="row">
                    <div class="d-none d-lg-block col-md-3">

                    </div>
                    <div class="col-9">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('New messages') }}</h5>
                            @if($count = Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\newMessage'])->count() == 0)
                                <h1>{{ __('No messages') }}</h1>
                            @else
                                <h1>{{ $count }}</h1>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-5">
            <div class="card p-4 card-purple fadeInUp mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Register requests') }}</h5>
                    @if(Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\registerRequest'])->count() == 0)
                        <h1>{{ __('No requests') }}</h1>
                    @else
                        <h1>{{ Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\registerRequest'])->count() }}</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card p-4 custom-card fadeInUp">--}}
{{--                <div class="card-body">--}}
{{--                    <h5>{{ __('Daily visitors') }}</h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="fadeInUp">
        <a href="{{ route('install_package') }}" class="badge badge-light fa-1x">Install</a>
        <div class="progress my-3">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <a href="{{ route('uninstall_package') }}" class="badge badge-light fa-1x">Uninstall</a>
    </div>


</div>
@endsection
