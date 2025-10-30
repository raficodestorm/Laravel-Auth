@extends('layouts.app')

@section('content')
<div class="container">
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
                <img src="{{ asset('storage/'.$user->profile_photo_path) }}" width="100" height="100" style="border-radius:50%; margin-bottom:10px;">
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
