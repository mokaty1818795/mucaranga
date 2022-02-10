<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--@livewireStyles--}}
</head>

<body>
    <div class="wrapper">
        @auth
            @include('layouts.shared.sidebar')
        @endauth
        <div class="main">
            @include('layouts.shared.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>
            @include('layouts.shared.footer')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('pages.js') }}"></script>
    @stack('js')
    {{--@livewireScripts--}}
</body>

</html>
