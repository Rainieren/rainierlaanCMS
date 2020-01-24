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
        <div class="col-md-7">
            <div class="card p-4 custom-card fadeInUp">
                <div class="row">
                    <div class="col-3">

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
        <div class="col-md-5">
            <div class="card p-4 card-purple fadeInUp">
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
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4 custom-card fadeInUp">
                <div class="card-body">
                    <h5>{{ __('Daily visitors') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
