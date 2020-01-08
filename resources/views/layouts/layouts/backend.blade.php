<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/Sortable.js') }}"></script>
<script src="{{ asset('js/jquery-sortable.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body style="background: #ffffff">
<div class="">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Information') }}</li>
            <li class="sidebar-item"><a href="{{ route('home') }}" class="sidebar-link {{ Route::currentRouteNamed('home') ? 'sidebar-active' : '' }}">{{ __('Dashboard') }}</a></li>
            <li class="sidebar-item title">{{ __('Content') }}</li>
            <li class="sidebar-item"><a href="{{ route('pages') }}" class="sidebar-link {{ Route::currentRouteNamed('pages') ? 'sidebar-active' : '' }}">{{ __('Pages') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('blocks') }}" class="sidebar-link {{ Route::currentRouteNamed('blocks') ? 'sidebar-active' : '' }}">{{ __('Blocks') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('layouts') }}" class="sidebar-link {{ Route::currentRouteNamed('layouts') ? 'sidebar-active' : '' }}">{{ __('Layouts') }}</a></li>
            <li class="sidebar-item title">{{ __('System') }}</li>
            <li class="sidebar-item"><a href="{{ route('users') }}"  class="sidebar-link {{ Route::currentRouteNamed('users') ? 'sidebar-active' : '' }}">{{ __('Users') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('roles') }}"  class="sidebar-link {{ Route::currentRouteNamed('roles') ? 'sidebar-active' : '' }}">{{ __('Roles') }}</a></li>
            <li class="sidebar-item"><a href="#"  class="sidebar-link {{ Route::currentRouteNamed('messages') ? 'sidebar-active' : '' }}" id="messages-link">{{ __('Messages') }} </a>
                @if(Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\newMessage'])->count() != 0)
                    <span class="badge badge-pill badge-danger">{{ Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\newMessage'])->count() }}</span>
                @endif
            </li>
            <li class="sidebar-item"><a href="{{ route('register_requests') }}" class="sidebar-link">{{ __('Register requests') }}</a>
                @if(Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\registerRequest'])->count() != 0)
                    <span class="badge badge-pill badge-danger">{{ Auth::user()->unreadNotifications->whereIn('type', ['App\Notifications\registerRequest'])->count() }}</span>
                @endif
            </li>
            <li class="sidebar-item title">{{ __('Other') }}</li>
            <li class="sidebar-item"><a href="{{ route('preferences') }}" class="sidebar-link  {{ Route::currentRouteNamed('preferences') ? 'sidebar-active' : '' }}">{{ __('Preferences') }}</a></li>
            <li class="sidebar-item"><a href="#" class="sidebar-link" id="slideout">Slideout test <i class="fal fa-chevron-circle-right slide-out-arrow"></i></a></li>
        </ul>

        <div class="user-profile">
            <a class="profile-link" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
                {{ Auth::user()->firstname }}
            </a>
        </div>
    </nav>

    <div class="dashboard-container">
        <div id="app">
          @yield('content')
        </div>
    </div>
</div>

<div class="slide-out shadow" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('System') }}</li>

        </ul>
    </nav>
</div>


</body>

<script>
        $('#messages-link').on('click', function() {
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
                    window.location.href = "{{ route('messages') }}";
                }
            })
        });
</script>
</html>
