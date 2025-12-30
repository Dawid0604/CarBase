<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @env(['production'])
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    @endenv
</head>

<body>
    <div id="app">
        @include('navbar')

        <main class="container-fluid" style="min-height: 100vh">
            @yield('content')
        </main>
    </div>

    @env(['production'])
        @livewireScripts
    @endenv
</body>

</html>
