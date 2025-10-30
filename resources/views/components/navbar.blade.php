<style>
  /* =================== google-font-Roboto & Ek-mesirri =================== */
  @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
  /* font-family: "Roboto", sans-serif; */
  /* font-family: "El Messiri", sans-serif; */


  /* ---------------------------------- navbar style ----------------------------------------- */
  .navbar {
    background-color: #6c6c6a26;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    padding: 0.5rem 0;
  }

  .navbar-brand {
    font-weight: 700;
    color: #780116;
    font-size: 1.6rem;
    letter-spacing: 1px;
  }

  .navbar-brand span {
    color: #db4d00fd;
    padding: 2px 10px;
    border-radius: 8px;
  }

  .navbar-nav .nav-link {
    color: #f7be02;
    font-weight: 500;
    margin: 0 10px;
    transition: all 0.3s ease;
    border-radius: 6px;
  }

  .navbar-nav .nav-link:hover {
    background: #dd3700;
    color: white;
    font-weight: 600;
  }

  /* Dropdowns */
  .dropdown-menu {
    border: none;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    background-color: #faff61;
    animation: dropdownFade 0.3s ease;
  }

  @keyframes dropdownFade {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .dropdown-item {
    color: #780116;
    font-weight: 500;
    transition: 0.3s;
  }

  .dropdown-item:hover {
    background-color: #ff0000;
    color: #fff;
    border-radius: 6px;
  }

  /* Submenu Style */
  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -5px;
    display: none;
    border-radius: 10px;
  }

  .dropdown-submenu:hover>.dropdown-menu {
    display: block;
  }

  /* User Dropdown */
  .user-dropdown img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 8px;
    border: 2px solid #220901;
  }

  .user-dropdown .dropdown-toggle {
    color: #f7eb02;
    font-weight: 500;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: 0.3s;
  }

  .user-dropdown .dropdown-toggle:hover {
    color: #f96204;
    opacity: 0.9;
  }

  @media (max-width: 992px) {
    .navbar-nav .nav-link {
      text-align: center;
      margin: 6px 0;
    }

    .user-dropdown {
      justify-content: center;
    }

    .dropdown-submenu .dropdown-menu {
      position: static;
      margin-left: 1rem;
      display: none;
    }

    .dropdown-submenu.show>.dropdown-menu {
      display: block;
    }
  }
</style>
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <span>RunStar</span>
    </a>
    <button class="navbar-toggler text-light border-0" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Book Ticket</a></li>

        <!-- Dropdown with Submenu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="servicesMenu" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="servicesMenu">
            <li><a class="dropdown-item" href="#">Bus Routes</a></li>
            <li><a class="dropdown-item" href="#">Offers</a></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle" href="#">Support</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Contact Us</a></li>
                <li><a class="dropdown-item" href="#">FAQ</a></li>
                <li><a class="dropdown-item" href="#">Live Chat</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="#">My Bookings</a></li>

        <!-- ✅ User Dropdown -->
        @auth
        <li class="nav-item dropdown user-dropdown ms-lg-3">
          <a class="dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" alt="User">
            {{ auth()->user()->fullname }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endauth

        @guest
        <li class="nav-item dropdown user-dropdown ms-lg-3">
          <a class="dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="" alt="">User
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="{{ route('register') }}">Registration</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="{{ route('login') }}">Login</a></li>
          </ul>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>