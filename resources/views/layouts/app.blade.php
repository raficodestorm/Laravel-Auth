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
            --main-color: #ff0000;
            --second-color: #780116;
            --section-bg-color: #fffffc;
        }

        body {
            background-color: var(--section-bg-color);
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
        .side{
            height: 80px;
            width: 80px;
            border-radius: 50%;
            margin: 20px;
            background-color: yellow;
            animation: lightchange 0.5s ease-in-out infinite;
        }
        @keyframes lightchange {
            0%{background-color: #80ffdb;}
            0%{background-color: #80ffdb;}
            0%{background-color: #80ffdb;}
            0%{background-color: #80ffdb;}
        }
        .auth-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            width: auto;
            padding: 2.5rem;
            transition: all 0.3s ease-in-out;
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
        <div class="side">

        </div>
        <div class="auth-card">
            {{-- Main content from pages like login/register --}}
            @yield('content')
        </div>
        <div class="side">

        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel App') }}. All rights reserved.</p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>