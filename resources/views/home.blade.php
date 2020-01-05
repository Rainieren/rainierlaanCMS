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
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('New messages') }}</h5>
                    @if(count(Auth::user()->unreadNotifications) == 0)
                        <h1>{{ __('No messages') }}</h1>
                    @else
                        <h1>{{ count(Auth::user()->unreadNotifications) }}</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Most visited page</h5>
                    <h1>Homepage</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Todo list</h5>
                    <ul class="">
                        <li>Zorg ervoor dat de hoofdpagina (route is /) ook uit de database geladen word. i.p.v de welcome view.</li>
                        <li>Een leuke toevoeging is dat je de kleur en thema kan aanpassen. Dark theme, White theme, accent color</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Number of blocks</h5>
                    <h1>10</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
