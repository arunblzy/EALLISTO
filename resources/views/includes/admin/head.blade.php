
<head>
    <title> {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    @vite([
        "resources/assets/plugins/global/plugins.bundle.css",
        "resources/assets/css/style.bundle.css",
        "resources/css/app.scss",
        "resources/js/app.js",
    ])
    @yield('styles')
    @stack('styles')
</head>
