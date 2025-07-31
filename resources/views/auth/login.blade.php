@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-gradient">
    <div class="card shadow-lg rounded-4 p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center text-danger fw-bold mb-4">Welcome Back 👋</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger w-100 shadow-sm">
                Login
            </button>

            <div class="text-center mt-3">
                <small>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none text-danger fw-semibold">Register here</a></small>
            </div>
        </form>
    </div>
</div>
@endsection
