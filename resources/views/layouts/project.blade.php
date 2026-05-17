<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Portfolio</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Portfolio Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('projects*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                            Projects
                        </a>
                    </li>
                    @auth
                        
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/types*') ? 'active' : '' }}" href="{{ route('admin.types.index') }}">
                            Types
                        </a>
                    </li>
                    @endauth
                    </li>
                        <li class="nav-item ms-lg-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm mt-1">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4 text-muted border-top bg-white mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} - </small>
        </div>
    </footer>

</body>
</html>