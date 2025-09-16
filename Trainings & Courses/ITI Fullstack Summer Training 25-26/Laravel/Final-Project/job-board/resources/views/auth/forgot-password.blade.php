<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Job Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', 'Instrument Sans', sans-serif;
        }
        .forgot-card {
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            background: #fff;
            padding: 2.5rem 2rem;
            margin-top: 60px;
        }
        .forgot-title {
            font-size: 2rem;
            font-weight: bold;
            color: #0d6efd;
            letter-spacing: 1px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-success {
            padding: 0.7rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 8px;
        }
        .logo {
            width: 70px;
            height: 70px;
            margin-bottom: 1.2rem;
        }
        @media (max-width: 768px) {
            .forgot-card { padding: 1.5rem 0.5rem; }
            .forgot-title { font-size: 1.3rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="forgot-card">
                    <div class="text-center mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" class="logo">
                        <div class="forgot-title">Forgot Your Password?</div>
                        <div class="text-muted mt-2 mb-3">
                            No problem. Enter your email and we'll send you a password reset link.
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success mb-3 text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('login') }}" class="text-decoration-underline text-secondary">Back to Login</a>
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
