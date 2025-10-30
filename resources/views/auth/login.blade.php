@extends('layouts.app')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
@section('content')
<style>
    /* ========== Login Form Styling ========== */
    form {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        width: 100%;
        min-width: 320px;
    }

    form label {
        color: var(--main-color);
        font-weight: 500;
        margin-bottom: 0.4rem;
        font-size: 0.95rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[name="login"] {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--section-bg-color);
        border-radius: 8px;
        background-color: #2a1d12;
        color: #fff;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    input:focus {
        border-color: var(--main-color);
        outline: none;
        box-shadow: 0 0 8px rgba(252, 243, 0, 0.5);
    }

    /* Error message styling */
    .auth-card div>div {
        color: #ff4d4d;
        font-size: 0.85rem;
        margin-top: 0.3rem;
    }

    /* Checkbox and label */
    input[type="checkbox"] {
        accent-color: var(--main-color);
        margin-right: 0.4rem;
    }

    /* Submit button */
    button[type="submit"] {
        background: linear-gradient(90deg, var(--main-color), var(--second-color));
        color: #1c110a;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 0.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 123, 0, 0.3);
    }

    button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 123, 0, 0.45);
    }

    /* Forgot password link */
    a {
        color: var(--second-color);
        font-weight: 500;
        text-align: right;
        display: block;
        margin-top: -0.8rem;
        font-size: 0.9rem;
        transition: color 0.3s;
    }

    a:hover {
        color: var(--main-color);
    }

    /* Title */
    h2 {
        text-align: center;
        color: var(--main-color);
        font-weight: 600;
        margin-bottom: 2rem;
        font-size: 1.8rem;
        letter-spacing: 1px;
    }

    /* Center alignment for smaller screens */
    @media (max-width: 480px) {
        .auth-card {
            width: 90%;
            padding: 2rem 1.5rem;
        }

        form {
            min-width: auto;
        }
    }
</style>
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