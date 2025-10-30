<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel App') }}</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap or Tailwind (choose one) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Style --}}
    <style>
        :root {
            --main-color: #fcf300;
            --second-color: #ff7b00;
            --bg-color: #1c110a;
            --section-bg-color: #3f3244;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background: var(--bg-color);
            border-radius: 16px;
            width: auto;
            padding: 2.5rem;
            position: relative;

            transition: all 0.3s ease-in-out;
        }

        @keyframes transf {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-3px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .auth-card::before,
        .auth-card::after {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            animation: transf 5s ease-in-out infinite;
            background: conic-gradient(from 0deg at center,
                    var(--main-color),
                    var(--second-color),
                    var(--second-color),
                    var(--main-color));
            border-radius: inherit;
            z-index: -2;
            padding: 2px;
        }

        .auth-card::after {
            filter: blur(10px);
        }




        .auth-card:hover {
            box-shadow: 0 8px 35px rgba(0, 0, 0, 0.15);
        }

        .auth-card h2 {
            text-align: center;
            color: var(--main-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .btn-main {
            background-color: var(--main-color);
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .btn-main:hover {
            background-color: var(--second-color);
        }

        a {
            color: var(--main-color);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div>
        @include('components.navbar')

    </div>
    <div class="auth-container">
        <div class="auth-card">
            {{-- Main content from pages like login/register --}}
            @yield('content')
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel App') }}. All rights reserved.</p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>