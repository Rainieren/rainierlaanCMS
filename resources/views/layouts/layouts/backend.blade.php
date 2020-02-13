<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rainierlaan | CMS</title>
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
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
</head>
<body style="background: #ffffff">

<nav class="sidebar shadow-sm">
    <a href="#" id="sidebar-collapse">
        <div class="sidebar-collapse shadow-sm">
            <i class="far fa-bars"></i>
        </div>
    </a>
    <div class="logo-header mt-3 mb-4">
        <a href="/"><h4>rainierlaanCMS</h4></a>
    </div>
    <ul class="list-unstyled">
        <li class="sidebar-item title">{{ __('Information') }}</li>
        <li class="sidebar-item"><a href="{{ route('home') }}" class="sidebar-link {{ Route::currentRouteNamed('home') ? 'sidebar-active' : '' }}">
            <div class="sidebar-icon">
                <i class="far fa-tachometer-alt-slowest"></i>
            </div><span class="sidebar-text">{{ __('Dashboard') }}</span></a>
        </li>
        <li class="sidebar-item title">{{ __('System') }}</li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="content">
                <div class="sidebar-icon">
                    <i class="far fa-layer-group"></i>
                </div><span class="sidebar-text"> {{ __('Content') }}</span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="system">
                <div class="sidebar-icon">
                    <i class="far fa-desktop"></i>
                </div><span class="sidebar-text"> {{ __('System') }}</span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="account">
                <div class="sidebar-icon">
                    <i class="far fa-user"></i>
                </div><span class="sidebar-text"> {{ __('Account') }}</span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="packages">
                <div class="sidebar-icon">
                    <i class="far fa-box-alt"></i>
                </div><span class="sidebar-text"> {{ __('Packages') }}</span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="settings">
                <div class="sidebar-icon">
                    <i class="far fa-cog"></i>
                </div><span class="sidebar-text"> {{ __('Settings') }}</span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link slide-out" data-slideout-item="other">
                <div class="sidebar-icon">
                    <i class="far fa-wrench"></i>
                </div><span class="sidebar-text"> {{ __('Other') }} </span>
                <i class="far fa-chevron-right" style="position:absolute; right: 0;"></i>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('notifications') }}" class="sidebar-link">
                <div class="sidebar-icon"><i class="far fa-bell"></i></div><span class="sidebar-text"> {{ __('Notifications') }}</span>
                @if(Auth::user()->unreadNotifications->count())
                    <span class="badge badge-danger" style="position:absolute; right: 0;">{{ Auth::user()->unreadNotifications->count() }}</span>
                @endif
            </a>
        </li>
    </ul>
    <ul class="list-unstyled sidebar-bottom mt-auto">
        <li class="sidebar-item">
            <a href="{{ route('logout') }}" class="sidebar-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="sidebar-icon">
                    <i class="fas fa-power-off"></i>
                </div><span class="sidebar-text">{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
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
            <li class="sidebar-item">
                <a href="{{ route('pages') }}" class="sidebar-link {{ Route::currentRouteNamed('pages') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-file-alt"></i>
                    </div>{{ __('Pages') }}
                </a>
            </li>
            <li class="sidebar-item"><a href="{{ route('blocks') }}" class="sidebar-link {{ Route::currentRouteNamed('blocks') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-cube"></i>
                    </div>{{ __('Blocks') }}
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('layouts') }}" class="sidebar-link {{ Route::currentRouteNamed('layouts') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-th-large"></i>
                    </div>{{ __('Layouts') }}
                </a>
            </li>
            <li class="sidebar-item title">{{ __('Design') }}</li>
            <li class="sidebar-item"><a href="" class="sidebar-link"  id="messages-link">
                    <div class="sidebar-icon">
                        <i class="far fa-pencil-paintbrush"></i>
                    </div>{{ __('Configuration') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-system" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('System') }}</li>
            <li class="sidebar-item"><a href="{{ route('users') }}"  class="sidebar-link {{ Route::currentRouteNamed('users') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-user-friends"></i>
                    </div>{{ __('Users') }}
                </a>
            </li>
            <li class="sidebar-item"><a href="{{ route('roles') }}"  class="sidebar-link {{ Route::currentRouteNamed('roles') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-user-shield"></i>
                    </div>{{ __('Roles') }}
                </a>
            </li>
            <li class="sidebar-item"><a href="{{ route('messages') }}"  class="sidebar-link {{ Route::currentRouteNamed('messages') ? 'sidebar-active' : '' }}" id="messages-link">
                    <div class="sidebar-icon">
                        <i class="far fa-comment-lines"></i>
                    </div>{{ __('Messages') }}
                </a>
            </li>
            <li class="sidebar-item"><a href="{{ route('register_requests') }}" class="sidebar-link {{ Route::currentRouteNamed('register_requests') ? 'sidebar-active' : '' }}"  id="messages-link">
                    <div class="sidebar-icon">
                        <i class="far fa-file-user"></i>
                    </div>{{ __('Register requests') }}
                </a>
            </li>
            @if(Route::has('visitors'))
                <li class="sidebar-item"><a href="@if(Route::has('visitors')) {{ route('visitors') }} @endif" class="sidebar-link"  id="messages-link">
                        <div class="sidebar-icon">
                            <i class="far fa-suitcase"></i>
                        </div>{{ __('Visitors') }}
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-account" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Account') }}</li>
{{--            {{ auth()->user() }}--}}
            <li class="sidebar-item">
                <a href="{{ route('profile', ['token' => Auth::user()->token]) }}" class="sidebar-link {{ Route::currentRouteNamed('profile') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-user"></i>
                    </div>{{ __('Profile') }}
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('downloads', ['token' => Auth::user()->token]) }}" class="sidebar-link {{ Route::currentRouteNamed('downloads') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-download"></i>
                    </div>{{ __('My downloads') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-packages" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Packages') }}</li>
            <li class="sidebar-item">
                <a href="{{ route('packages') }}" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="far fa-boxes-alt"></i>
                    </div>{{ __('Browse packages') }}
                </a>
            </li>
            <li class="sidebar-item">
                <a href="" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="far fa-box-check"></i>
                    </div>{{ __('Installed packages') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-settings" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Settings') }}</li>
            <li class="sidebar-item">
                <a href="" class="sidebar-link">
                    <div class="sidebar-icon">
                        <i class="far fa-pencil-paintbrush"></i>
                    </div>{{ __('Configuration') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-block shadow slide-out-other" id="slide-out">
    <nav class="sidebar-slideout">
        <ul class="list-unstyled">
            <li class="sidebar-item title">{{ __('Other') }}</li>
            <li class="sidebar-item">
                <a href="{{ route('preferences') }}" class="sidebar-link  {{ Route::currentRouteNamed('preferences') ? 'sidebar-active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="far fa-sliders-h"></i>
                    </div>{{ __('Preferences') }}
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="slide-out-overlay"></div>
</body>
<script>

</script>
</html>
