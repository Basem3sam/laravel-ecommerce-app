<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body class="wrapper">
    <div class="content">
        @yield('login')
        @yield('register')
    </div>

    <footer class="footer">
        <p class="footer-text">&copy; 2024 OnlineStore. All rights reserved.</p>
    </footer>

    <script src="{{ asset('assets/js/validate.js') }}"></script>
</body>
</html>
