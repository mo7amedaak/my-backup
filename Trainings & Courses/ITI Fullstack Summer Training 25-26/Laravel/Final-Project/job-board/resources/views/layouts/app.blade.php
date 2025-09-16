<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Job Board') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
        .main-navbar {
            background: linear-gradient(90deg, #198754 0%, #22d3ee 100%);
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
            padding: 0.7rem 0;
        }
        .main-navbar .logo {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .main-navbar .site-title {
            font-size: 1.4rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .main-navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 12px;
            transition: color 0.2s;
        }
        .main-navbar .nav-link:hover {
            color: #22d3ee !important;
        }
        .main-navbar .btn-login {
            background: #fff;
            color: #198754;
            border-radius: 6px;
            padding: 0.3rem 1.2rem;
            font-weight: 500;
            border: none;
            margin-left: 10px;
        }
        .main-navbar .btn-login:hover {
            background: #22d3ee;
            color: #fff;
        }
        .page-header {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 1.5rem 0 1rem 0;
            margin-bottom: 30px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="main-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" class="logo">
                <span class="site-title">Job Board</span>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-login">Register</a>
                @else
                    @php
                        $role = Auth::user()->role ?? '';
                        if ($role === 'admin') {
                            $dashboardRoute = route('admin.dashboard');
                        } elseif ($role === 'employer') {
                            $dashboardRoute = route('employer.dashboard');
                        } else {
                            $dashboardRoute = route('candidate.dashboard');
                        }
                    @endphp
                    <a href="{{ $dashboardRoute }}" class="nav-link">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-login">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    @isset($header)
        <header class="page-header">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main>
        <div class="container py-4">
            @yield('content')
        </div>
    </main>
</body>
</html>
