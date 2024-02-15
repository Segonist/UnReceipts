<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8c9cf2" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>
        {{ $title }}
    </title>
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/header.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/' . $css . '.css') }}">
</head>

<body>
    <header class="glass">
        <a class="header-left" href="/">
            <img src="{{ asset('img/logo.svg') }}">
            <h1><span>Un</span>Receipts</h1>
        </a>
        <div class="header-right">
            <div class="language">🇺🇸</div>
            <button class="btn profile-picture toggle-menu-button"><img src="{{ asset('img/user.svg') }}"></button>
        </div>
    </header>

    <div class="glass user-actions toggle-menu" tabIndex="-1">
        @auth
            <a href="/dashboard" class="btn user-action-button">Dashboard</a>
            <a href="#" class="btn user-action-button">Settings</a>
            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')
                <input class="btn user-action-button" type="submit" value="Log out">
            </form>
        @else
            <a href="/login" class="btn user-action-button">Log in</a>
            <a href="/register" class="btn user-action-button">Register</a>
        @endauth
    </div>

    <script src="{{ asset('js/toggleMenu.js') }}"></script>

    {{ $slot }}

    <footer class="glass">
        <div class="autor-info">
            <p>Made By <span>Segonist</span></p>
        </div>
        <div class="autor-links">
            <a href="https://github.com/Segonist" target="_blank"><img src="{{ asset('img/github.svg') }}"
                    alt="github link"></a>
            <a href="https://discordapp.com/users/491260818139119626" target="_blank"><img
                    src="{{ asset('img/discord.svg') }}" alt="discord link"></a>
        </div>
    </footer>
    <script src="{{ asset('js/preventDrag.js') }}"></script>
</body>

</html>
