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
                    @if($count = Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\newMessage'])->count() == 0)
                        <h1>{{ __('No messages') }}</h1>
                    @else
                        <h1>{{ $count }}</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Register requests') }}</h5>
                    @if($count = Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\registerRequest'])->count() == 0)
                        <h1>{{ __('No requests') }}</h1>
                    @else
                        <h1>{{ $count }}</h1>
                    @endif
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
                        <li>Administrator moet eerst een verzoek van account aanmaken goedkeuren voordat deze ook gebruikt kan worden. Zodra verozek is goedgekeurd dan krijgt de persoon een nmail met daarin een link. twee knoppen, groen en rood, rod is verwijderen en groen accepteren</li>
                        <li>Berichten moeten kunnen worden verwijderd.</li>
                        <li>Rollen moeten kunnen worden verwijderd en worden aangepast.</li>
                        <li>Bij het bewerken van een rol moet je kunnen aangeven welke dingen de persoon met de rollen kan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
