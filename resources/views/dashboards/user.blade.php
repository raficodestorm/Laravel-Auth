@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-6">
      {{-- Logout button --}}
      <form method="POST" action="{{ route('logout') }}" class="mb-3">
        @csrf
        <a href="{{ route('logout') }}" class="btn btn-danger"
          onclick="event.preventDefault(); this.closest('form').submit();">
          Log Out
        </a>
      </form>
    </div>
    <div class="col-6">
      <a href="{{ route('profile.edit') }}">Edit profile</a>
    </div>
</div>
  <h1>User Dashboard</h1>
  <p>Welcome, {{ auth()->user()->fullname }}</p>

  {{-- Profile photo (uncomment if available) --}}
  <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" class="img-fluid rounded-circle" width="120">
</div>
@endsection