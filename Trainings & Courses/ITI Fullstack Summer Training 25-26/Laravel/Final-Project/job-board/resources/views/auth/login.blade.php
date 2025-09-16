<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Job Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            background: #fff;
            padding: 2.5rem 2rem;
            margin-top: 60px;
        }
        .logo {
            width: 70px;
            height: 70px;
            margin-bottom: 1.2rem;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="login-card p-4 p-md-5 my-5 shadow-lg rounded-5">
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" class="logo">
                        <h1 class="h3 fw-bold text-primary">Welcome Back</h1>
                        <div class="text-muted mt-2">Login to your account</div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control form-control-lg">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg">
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 form-check d-flex justify-content-between">
                            <div>
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label text-muted">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-secondary" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">Log in</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>