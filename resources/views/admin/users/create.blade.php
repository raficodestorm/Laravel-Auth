@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create Admin / Counter Manager</h2>

  <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
      <label>Fullname</label>
      <input name="fullname" required>
      @error('fullname')<div>{{ $message }}</div>@enderror
    </div>

    <div>
      <label>Username</label>
      <input name="username" required>
      @error('username')<div>{{ $message }}</div>@enderror
    </div>

    <div>
      <label>Email</label>
      <input name="email" type="email" required>
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
      <label>Role</label>
      <select name="role" required>
        <option value="counter_manager">Counter Manager</option>
        <option value="admin">Admin</option>
      </select>
      @error('role')<div>{{ $message }}</div>@enderror
    </div>

    <div>
      <label>Father Name</label>
      <input name="father_name" required>
    </div>

    <div>
      <label>Phone</label>
      <input name="phone" required>
    </div>

    <div>
      <label>Address</label>
      <textarea name="address" required></textarea>
    </div>

    <div>
      <label>NID No</label>
      <input name="nid_no" required>
    </div>

    <div>
      <label>Profile Picture</label>
      <input type="file" name="profile_photo">
    </div>

    <div>
      <button type="submit">Create</button>
    </div>
  </form>
</div>
@endsection