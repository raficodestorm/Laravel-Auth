@extends('layouts.app')

@section('content')
<style>
  /* ========== Create Admin / Counter Manager Form ========== */

  h2 {
    text-align: center;
    color: var(--main-color);
    font-weight: 600;
    margin-bottom: 2rem;
    font-size: 1.8rem;
    letter-spacing: 1px;
  }

  .auth-card {
    margin-top: 50px
  }

  /* Form container */
  form {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
    width: 100%;
    min-width: 400px;
  }

  /* Each field group */
  form>div {
    display: flex;
    flex-direction: column;
  }

  /* Labels */
  form label {
    color: var(--main-color);
    font-weight: 500;
    font-size: 0.95rem;
    margin-bottom: 0.4rem;
  }

  /* Input, select, and textarea */
  input[type="text"],
  input[type="email"],
  input[type="password"],
  input[type="file"],
  input[name="nid_no"],
  input[name="father_name"],
  input[name="phone"],
  select,
  textarea {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 2px solid var(--section-bg-color);
    border-radius: 8px;
    background-color: #2a1d12;
    color: #fff;
    font-size: 0.95rem;
    transition: border 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
  }

  /* Focus Effect */
  input:focus,
  select:focus,
  textarea:focus {
    border-color: var(--main-color);
    outline: none;
    box-shadow: 0 0 8px rgba(252, 243, 0, 0.5);
    background-color: #362416;
  }

  /* Textarea */
  textarea {
    resize: vertical;
    min-height: 90px;
  }

  /* Select dropdown */
  select {
    background-color: #2a1d12;
    color: #fff;
    cursor: pointer;
  }

  select option {
    background-color: #1c110a;
    color: #fff;
  }

  /* File input styling */
  input[type="file"] {
    padding: 0.4rem;
    border: 1.5px dashed var(--second-color);
    background-color: #25180e;
    cursor: pointer;
  }

  input[type="file"]:hover {
    border-color: var(--main-color);
  }

  input::file-selector-button {
    background: var(--second-color);
    color: #fff;
    border: none;
    padding: 0.45rem 0.8rem;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  input::file-selector-button:hover {
    background: var(--main-color);
    color: #1c110a;
  }

  /* Error message */
  .auth-card div>div {
    color: #ff4d4d;
    font-size: 0.85rem;
    margin-top: 0.3rem;
  }

  /* Submit Button */
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

  /* Responsive */
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