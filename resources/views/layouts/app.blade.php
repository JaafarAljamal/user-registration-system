<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        @auth()
            <a href="{{route('home')}}">Dashboard</a>
            <a href="{{route('profile.show')}}">Profile</a>
            <a
                href="#" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form method="POST" action="{{route('logout')}}" id="logout-form" style="display: none;">
                @csrf
            </form>
        @endauth

        @guest()
            <a href="{{route('login.showLoginForm')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
        @endguest
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2026 User System</p>
    </footer>
</body>
</html>