@extends('layouts.app')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
@section('content')
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Username or Email</label>
            <input name="login" value="{{ old('login') }}" required>
            @error('login')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
            @error('password')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>

        <div>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </form>
</div>
@endsection