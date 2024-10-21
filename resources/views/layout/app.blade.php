<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/yeti-bootstrap.min.css') }}" rel="stylesheet">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="icon" href="{{ asset('images/load.jpeg') }}">
    <link href="{{ asset('fontawesome-free-6.2.0-web/css/all.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <style>
        /* Style for fixed navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        body {
            padding-top: 70px; /* Adjust this based on navbar height */
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item" {{ is_hidden('user.index') }}>
                        <a class="nav-link" href="{{ route('user.index') }}">User</a>
                    </li>
                    <li class="nav-item dropdown" {{ is_hidden('kriteria.index') }}>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kriteria
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('kriteria.index') }}">Kriteria</a></li>
                            <li><a class="dropdown-item" href="{{ route('crisp.index') }}">Sub Kriteria (Crisp)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" {{ is_hidden('alternatif.index') }}>
                        <a class="nav-link" href="{{ route('alternatif.index') }}">Alternatif</a>
                    </li>
                    <li class="nav-item" {{ is_hidden('rel_alternatif.index') }}>
                        <a class="nav-link" href="{{ route('rel_alternatif.index') }}">Nilai Alternatif</a>
                    </li>
                    <li class="nav-item" {{ is_hidden('hitung.index') }}>
                        <a class="nav-link" href="{{ route('hitung.index') }}">Rank</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nama_user }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.password') }}">Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        <h1 class="border-bottom pb-1 mb-3">@yield('title', $title)</h1>
        @yield('content')
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-muted">
            <span>Copyright &copy; {{ date('Y') }}</span> NW
            <em class="float-end">Updated 24 Oktober 2023</em>
        </div>
    </footer>
</body>

</html>
