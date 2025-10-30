@extends('layouts.app')

@section('content')
<style>
  /* ========== Admin Dashboard Styling ========== */

  .container {
    color: #fff;
  }

  /* Dashboard Header Row */
  .container .row {
    margin-bottom: 2rem;
    justify-content: center;
    text-align: center;
  }

  /* Action buttons/links (Logout, Edit Profile, Add Manager) */
  .container .row .col-4 a {
    display: inline-block;
    background: linear-gradient(90deg, var(--main-color), var(--second-color));
    color: #1c110a;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    padding: 0.7rem 1.4rem;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(255, 123, 0, 0.25);
    font-size: 0.95rem;
  }

  .container .row .col-4 a:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 123, 0, 0.45);
  }

  /* Log Out button (red theme override) */
  .container .row .col-4 .btn-danger {
    background: #d9534f;
    border: none;
    color: #fff;
    font-weight: 600;
    transition: 0.3s ease;
  }

  .container .row .col-4 .btn-danger:hover {
    background: #c9302c;
    transform: translateY(-2px);
  }

  /* Dashboard Title */
  .container h1 {
    text-align: center;
    color: var(--main-color);
    font-weight: 700;
    margin-bottom: 1rem;
    letter-spacing: 1px;
  }

  /* Welcome Message */
  .container p {
    text-align: center;
    color: #ddd;
    font-size: 1rem;
    margin-bottom: 2rem;
  }

  /* Profile Image */
  .container img {
    display: block;
    margin: 0 auto;
    border: 3px solid var(--main-color);
    padding: 5px;
    border-radius: 50%;
    box-shadow: 0 0 15px rgba(252, 243, 0, 0.3);
    transition: all 0.3s ease;
  }

  .container img:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px rgba(255, 123, 0, 0.4);
  }

  /* Subtle animation for dashboard entrance */
  @keyframes fadeSlideIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .container {
    animation: fadeSlideIn 0.8s ease forwards;
  }

  /* Responsive Layout */
  @media (max-width: 768px) {
    .container .row .col-4 {
      width: 100%;
      margin-bottom: 1rem;
    }

    .container .row .col-4 a {
      width: 100%;
    }
  }
</style>
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