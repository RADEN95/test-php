<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') . ' - ' . $title }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('style')
</head>

<body>
    <div id="app">
        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="{{ route('home') }}">Lara'<span
                            class="text-primary">Bus</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('browse.*') ? 'active' : '' }}"
                                    href="{{ route('browse.index') }}">Browse By</a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endauth
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item ms-4">
                                        <a href="{{ route('login') }}"
                                            class="btn btn-primary rounded-5 border-0 bg-gradient">Login</a>
                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="fw-bold">Lara'<span class="text-primary">Bus</span></h4>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @stack('script')
</body>

</html>
