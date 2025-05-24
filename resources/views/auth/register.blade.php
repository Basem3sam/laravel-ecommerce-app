@extends('auth.layout.auth')

@section('title', 'Register')

@section('register')
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>

            <!-- Displaying error messages if they exist -->
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <!-- Registration form -->
            <form method="POST" action="{{ route('auth.store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" class="form-control">
                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-footer">
                    <input type="submit" value="Register" class="button-submit">
                </div>
            </form>

            <!-- Link to login page -->
            <div class="login-link">
                <p>Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
            </div>
        </div>
    </div>
@endsection
