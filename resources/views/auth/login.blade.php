@extends('auth.layout.auth')

@section('title', 'Login')

@section('login')
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('auth.validateUser') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-footer">
                    <input type="submit" value="Login" class="button-submit">
                </div>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('auth.register') }}">Register</a></p>
            </div>
        </div>
    </div>
@endsection
