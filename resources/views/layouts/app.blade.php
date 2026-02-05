<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <nav></nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2026 User System</p>
    </footer>
</body>
</html>