<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body style="background: #ffffff">
    <div id="">
{{--        HEADER CONTENT          --}}
        <section class="header">
            <nav class="navbar navbar-expand-md {{ $header->placement }} navbar-light {{ $header->shadow }}" style="background-color: {{ $header->color }}">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="">About me</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Experiences</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>


        <main class="">
            @yield('content')
        </main>
    </div>

{{--    FOOTER CONTENT      --}}
    <section class="footer"></section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>