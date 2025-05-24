<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title', 'AdminHome')</title>
</head>
<body>
    <div class="wrapper">
        <div class="navbar">
            <a class="button-link" href="{{ route('admin.dashboard') }}">
                <div class="navbar-role">
                    @if (Auth::check())
                        <h3 class="role-header">Welcome, {{ ucfirst(Auth::user()->name) }}</h3>
                    @else
                        <h3 class="role-header">Welcome, Guest</h3>
                    @endif
                </div>
            </a>
            <a class="button-link" href="{{ route('user.home') }}">
                <div class="navbar-role">
                    <h3 class="role-header">Go User Mode</h3>
                </div>
            </a>
            <a class="button-link" href="{{ route('products.index') }}">Products</a>
            <a class="button-link" href="{{ route('admin.categories.index') }}">Categories</a>

            @if (Auth::check())
                <form method="POST" action="{{ route('auth.logout') }}" class="navbar-form">
                    @csrf
                    <input type="submit" value="Logout" class="navbar-logout">
                </form>
            @else
                <a class="button-link" href="{{ route('auth.login') }}">Login</a>
            @endif
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <div class="custom-container">
            <p class="footer-text">&copy; 2024 OnlineStore. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
