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

<nav class="sidebar">
    <ul class="list-unstyled">
        <li class="sidebar-item title">{{ __('Information') }}</li>
        <li class="sidebar-item"><a href="{{ route('home') }}" class="sidebar-link {{ Route::currentRouteNamed('home') ? 'sidebar-active' : '' }}">
                <div class="sidebar-icon">
                    <i class="far fa-tachometer-alt-slowest"></i>
                </div>{{ __('Dashboard') }}</a>
        </li>
        <li class="sidebar-item title">{{ __('System') }}</li>
        <li class="sidebar-item"><a href="#" class="sidebar-link slide-out" data-slideout-item="content">
                <div class="sidebar-icon"><i class="far fa-layer-group"></i></div>{{ __('Content') }}<i class="far fa-chevron-right" style="position:absolute; right: 0;"></i></a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-link slide-out" data-slideout-item="system">
                <div class="sidebar-icon"><i class="far fa-cog"></i></div>{{ __('System') }}<i class="far fa-chevron-right" style="position:absolute; right: 0;"></i></a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-link slide-out" data-slideout-item="account">
                <div class="sidebar-icon"><i class="far fa-user"></i></div> {{ __('Account') }}<i class="far fa-chevron-right" style="position:absolute; right: 0;"></i></a></li>
        <li class="sidebar-item"><a href="#" class="sidebar-link slide-out" data-slideout-item="other">
                <div class="sidebar-icon"><i class="far fa-wrench"></i></div>{{ __('Other') }}<i class="far fa-chevron-right" style="position:absolute; right: 0;"></i></a></li>
        <li class="sidebar-item">
            <a href="{{ route('notifications') }}">
                <div class="sidebar-icon"><i class="far fa-bell"></i></div>{{ __('Notifications') }}
                @if(Auth::user()->unreadNotifications->count())
                    <span class="badge badge-danger" style="position:absolute; right: 0;">{{ Auth::user()->unreadNotifications->count() }}</span>
                @endif
            </a>
        </li>
    </ul>

    <ul class="list-unstyled mt-auto mb-0">

        <li class="sidebar-item">
            <img src="https://s3.amazonaws.com/static.digg.com/images/0d220736ec91419682471c71dfc8a439_407c1382cbc6d6213971e53f30091ec1_1_original.jpeg" width="25" height="25" style="object-fit: cover; border-radius: 25px">
        </li>
    </ul>
</nav>

<div class="dashboard-container">
    <div id="app">
      @yield('content')
    </div>
</div>


<div class="slide-out-block shadow slide-out-content" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Content') }}</li>
            <li class="sidebar-item"><a href="{{ route('pages') }}" class="sidebar-link {{ Route::currentRouteNamed('pages') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-file-alt"></i></div>{{ __('Pages') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('blocks') }}" class="sidebar-link {{ Route::currentRouteNamed('blocks') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-cube"></i></div>{{ __('Blocks') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('layouts') }}" class="sidebar-link {{ Route::currentRouteNamed('layouts') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-th-large"></i></div>{{ __('Layouts') }}</a></li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-system" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('System') }}</li>
            <li class="sidebar-item"><a href="{{ route('users') }}"  class="sidebar-link {{ Route::currentRouteNamed('users') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-user-friends"></i></div>{{ __('Users') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('roles') }}"  class="sidebar-link {{ Route::currentRouteNamed('roles') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-user-shield"></i></div>{{ __('Roles') }}</a></li>
            <li class="sidebar-item"><a href="{{ route('messages') }}"  class="sidebar-link {{ Route::currentRouteNamed('messages') ? 'sidebar-active' : '' }}" id="messages-link">
                    <div class="sidebar-icon"><i class="far fa-comment-lines"></i></div>{{ __('Messages') }} </a></li>
            <li class="sidebar-item"><a href="{{ route('register_requests') }}" class="sidebar-link {{ Route::currentRouteNamed('register_requests') ? 'sidebar-active' : '' }}"  id="messages-link">
                    <div class="sidebar-icon"><i class="fal fa-file-user"></i></div>{{ __('Register requests') }}</a></li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-account" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Account') }}</li>
            <li class="sidebar-item"><a href="{{ route('profile', ['id' => Auth::user()->user_token]) }}" class="sidebar-link {{ Route::currentRouteNamed('profile') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-user"></i></div>{{ __('Profile') }}</a>
            </li>
            <li class="sidebar-item"><a href="" class="sidebar-link">
                    <div class="sidebar-icon"><i class="far fa-download"></i></div>{{ __('My downloads') }}</a>
            </li>
            <li class="sidebar-item"><a href="{{ route('addresses', ['token' => Auth::user()->user_token]) }}" class="sidebar-link {{ Route::currentRouteNamed('addresses') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-home-lg-alt"></i></div>{{ __('Address book') }}</a>
            </li>
            <li class="sidebar-item"><a href="" class="sidebar-link">
                    <div class="sidebar-icon"><i class="far fa-file-invoice-dollar"></i></div>{{ __('Billing history') }}</a>
            </li>
            <li class="sidebar-item"><a href="" class="sidebar-link">
                    <div class="sidebar-icon"><i class="far fa-credit-card"></i></div>{{ __('Payment methods') }}</a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-other" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Other') }}</li>
            <li class="sidebar-item"><a href="{{ route('preferences') }}" class="sidebar-link  {{ Route::currentRouteNamed('preferences') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon"><i class="far fa-sliders-h"></i></div>{{ __('Preferences') }}</a></li>
        </ul>
    </nav>
</div>

<div class="slide-out-overlay"></div>
</body>

<script>

</script>
</html>