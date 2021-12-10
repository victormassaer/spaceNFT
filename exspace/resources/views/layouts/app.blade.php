<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/astronaut_helmet_favicon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Exspace</title>
</head>
<body>
    @auth
        @include('components.navLoggedIn')
    @endauth
    @guest
        @include('components.navLoggedOut')
    @endguest
    @yield('content')

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
        type="application/javascript"></script>

        <script src="{{ asset('assets/js/contract.js') }}"></script>
    @livewireScripts
</body>
</html>
