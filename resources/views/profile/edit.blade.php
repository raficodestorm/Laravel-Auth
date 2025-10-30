@extends('layouts.app')

@section('content')
<style>
    /* Profile Edit Page Styling */
    :root {
        --main-color: #ff0000;
        --second-color: #780116;
        --section-bg-color: #0d0d0d;
        --card-bg: #1a1a1a;
        --text-color: #f5f5f5;
        --input-bg: #262626;
        --border-color: #444;
    }

    .auth-card {
        margin-top: 50px
    }


    .container-profile {
        background: var(--card-bg);
        max-width: 600px;
        margin: 60px auto;
        padding: 40px 50px;
        border-radius: 14px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.4);
        transition: all 0.3s ease-in-out;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .container-profile:hover {
        box-shadow: 0 6px 25px rgba(255, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: var(--main-color);
        margin-bottom: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    form div {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: 500;
        color: #ccc;
        margin-bottom: 5px;
    }

    input,
    textarea,
    select {
        background: var(--input-bg);
        color: var(--text-color);
        padding: 10px 14px;
        border-radius: 6px;
        border: 1px solid var(--border-color);
        font-size: 15px;
        transition: all 0.3s ease;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: var(--main-color);
        box-shadow: 0 0 6px rgba(255, 0, 0, 0.3);
    }

    textarea {
        min-height: 80px;
        resize: vertical;
    }

    img {
        border: 2px solid var(--main-color);
        margin-bottom: 8px;
        border-radius: 50%;
    }

    button {
        background: var(--main-color);
        color: #fff;
        padding: 12px 16px;
        font-weight: 600;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    button:hover {
        background: var(--second-color);
        transform: translateY(-2px);
        box-shadow: 0 0 12px rgba(255, 0, 0, 0.25);
    }

    button:active {
        transform: scale(0.97);
    }

    [style*="color:green"] {
        background: rgba(0, 255, 0, 0.08);
        padding: 8px 12px;
        border-left: 4px solid #00ff66;
        border-radius: 4px;
        font-weight: 500;
        color: #00ff66 !important;
    }

    [style*="color:red"] {
        color: #ff4d4d !important;
        font-size: 14px;
        margin-top: 4px;
    }

    @media (max-width: 600px) {
        .container-profile {
            padding: 25px;
        }

        h2 {
            font-size: 22px;
        }

        button {
            font-size: 15px;
            padding: 10px;
        }
    }
</style>
<div class="container container-profile">
    <h2>Update Profile</h2>

    @if (session('status') === 'profile-updated')
    <div style="color:green; margin-bottom:10px;">Profile updated successfully!</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <label>Full Name</label>
            <input name="fullname" value="{{ old('fullname', $user->fullname) }}" required>
            @error('fullname')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Username</label>
            <input name="username" value="{{ old('username', $user->username) }}" required>
            @error('username')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Email</label>
            <input name="email" type="email" value="{{ old('email', $user->email) }}" required>
            @error('email')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Phone</label>
            <input name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div>
            <label>Address</label>
            <textarea name="address">{{ old('address', $user->address) }}</textarea>
        </div>

        @if(in_array($user->role, ['admin', 'vendor', 'manager']))
        <div>
            <label>Father Name</label>
            <input name="father_name" value="{{ old('father_name', $user->father_name) }}">
        </div>

        <div>
            <label>NID No</label>
            <input name="nid_no" value="{{ old('nid_no', $user->nid_no) }}">
        </div>
        @endif

        <div>
            <label>Profile Photo</label><br>
            @if($user->profile_photo_path)
            <img src="{{ asset('storage/'.$user->profile_photo_path) }}" width="100" height="100"
                style="border-radius:50%; margin-bottom:10px;">
            @endif
            <input type="file" name="profile_photo">
        </div>

        <div>
            <label>New Password (optional)</label>
            <input type="password" name="password">
            @error('password')<div style="color:red;">{{ $message }}</div>@enderror
        </div>

        <div>
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <br>
        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection