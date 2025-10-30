<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<style>
    /* ========== Register Page Styling ========== */

    h2 {
        text-align: center;
        color: var(--main-color);
        font-weight: 600;
        margin-bottom: 2rem;
        font-size: 1.8rem;
        letter-spacing: 1px;
    }

    /* Form container */
    form {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        width: 100%;
        min-width: 350px;
    }

    /* Label styling */
    form label {
        color: var(--main-color);
        font-weight: 500;
        font-size: 0.95rem;
        margin-bottom: 0.4rem;
        display: block;
    }

    /* Input and textarea */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"],
    input[name="username"],
    input[name="fullname"],
    input[name="phone"],
    textarea {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid var(--section-bg-color);
        border-radius: 8px;
        background-color: #2a1d12;
        color: #fff;
        transition: border 0.3s ease, box-shadow 0.3s ease, background 0.3s;
        font-size: 0.95rem;
    }

    /* Focus effect */
    input:focus,
    textarea:focus {
        border-color: var(--main-color);
        outline: none;
        box-shadow: 0 0 8px rgba(252, 243, 0, 0.5);
        background-color: #362416;
    }

    /* Textarea adjustments */
    textarea {
        resize: vertical;
        min-height: 80px;
    }

    /* File input */
    input[type="file"] {
        padding: 0.4rem;
        border: 1.5px dashed var(--second-color);
        background-color: #25180e;
        cursor: pointer;
    }

    input[type="file"]:hover {
        border-color: var(--main-color);
    }

    /* Error message */
    .auth-card div>div {
        color: #ff4d4d;
        font-size: 0.85rem;
        margin-top: 0.3rem;
    }

    /* Submit button */
    button[type="submit"] {
        background: linear-gradient(90deg, var(--main-color), var(--second-color));
        color: #1c110a;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 123, 0, 0.3);
        font-size: 1rem;
    }

    button[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 123, 0, 0.45);
    }

    /* File upload text */
    input::file-selector-button {
        background: var(--second-color);
        color: #fff;
        border: none;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input::file-selector-button:hover {
        background: var(--main-color);
        color: #1c110a;
    }

    /* Small screens */
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
    <h2>Register (General User)</h2>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Fullname</label>
            <input name="fullname" value="{{ old('fullname') }}" required>
            @error('fullname')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Username</label>
            <input name="username" value="{{ old('username') }}" required>
            @error('username')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Email</label>
            <input name="email" value="{{ old('email') }}" required>
            @error('email')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
            @error('password')<div>{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <label>Phone</label>
            <input name="phone" value="{{ old('phone') }}">
        </div>

        <div>
            <label>Address</label>
            <textarea name="address">{{ old('address') }}</textarea>
        </div>

        <div>
            <label>Profile Picture</label>
            <input type="file" name="profile_photo">
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</div>
@endsection