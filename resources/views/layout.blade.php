<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myForum</title>
    <link rel="stylesheet" href="/assets/mdbootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/mdbootstrap/css/mdb.css">
    <link rel="stylesheet" href="/assets/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/assets/mdbootstrap/js/jquery.js"></script>
    <script src="/assets/mdbootstrap/js/bootstrap.js"></script>
    <script src="/assets/mdbootstrap/js/popper.js"></script>
    <script src="/js/app.js"></script>
    @stack('scripts')
</head>
<body>
<div class="w-100 bg-primary font-weight-bolder p-3 navbar"><a class="text-reset title" href="/">My Forum</a></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        @if (Auth::user())
            <form method="post" class="nav-item" action="{{ route('logout') }}">
                @csrf
                <button type=submit class="btn success-color">Logout {{ Auth::user()->pseudo }}</button>
            </form>
        @else
            <li class="nav-item"><a href="{{ route('login') }}" class="btn danger-color">Login</a></li>
        @endif
        <li class="nav-item"><a href="{{ route('themes.index') }}" class="btn">Gestion des thèmes</a></li>
        <li class="nav-item"><a href="{{ route('references.index') }}" class="btn">Gestion des références</a></li>
        <li class="nav-item"><a href="{{ route('roles.index') }}" class="btn">Gestion des rôles</a></li>
        <li class="nav-item"><a href="{{ route('states.index') }}" class="btn">Gestion des états</a></li>
        <li class="nav-item"><a href="{{ route('themes.index') }}" class="btn">Modération</a></li>
        @if (Auth::user()->isAdmin())
            <li class="nav-item"><a href="{{ route('users.index') }}" class="btn">Gestion des utilisateurs</a></li>
        @endif

    </ul>
</nav>
@if ($message = Session::get('message'))
    <div class="w-100 container text-center alert-success alert-block mb-3 flashmessage">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container p-3">
    @yield ('content')
</div>
</body>
</html>
