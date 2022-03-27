<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1366, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AllCabels') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-multiple-select/src/jquery.multi-select.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiselect.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('scripts')
</head>
<body>
    <section>
        <!-- Sidebar -->
        <x-aside />
        <div class="content">
            <!-- Header -->
            <x-header />
            @yield('content')
        </div>
    </section>
</body>
</html>
