<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}"></script>

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
            <li class="sidebar-item"><a href="{{ route('messages') }}"  class="sidebar-link {{ Route::currentRouteNamed('messages') ? 'sidebar-active' : '' }}">{{ __('Messages') }} </a></li>
            <li class="sidebar-item title">{{ __('Other') }}</li>
            <li class="sidebar-item"><a href="{{ route('preferences') }}">{{ __('Preferences') }}</a></li>
        </ul>
    </nav>

    <div class="dashboard-container">
        <div id="app">
          @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/Sortable.js') }}"></script>
<script src="{{ asset('js/jquery-sortable.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>