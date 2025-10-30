<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
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