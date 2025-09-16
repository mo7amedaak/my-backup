<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile Page</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .btn-success, .btn-danger {
            border-radius: 50px;
        }
        /* Fade-in animation for cards */
        .card-animated {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.6s ease-out forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Placeholder for x-navbar component -->
    <x-navbar />

    <div class="container py-4">
    

        <h2 class="mb-4 text-primary fw-bold card-animated" style="animation-delay: 0.1s;">Profile Settings</h2>

        <!-- Update Profile -->
        <div class="card mb-4 shadow-sm card-animated" style="animation-delay: 0.3s;">
            <div class="card-header bg-primary text-white fw-bold">Update Profile Information</div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success px-4">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Change Password -->
        <div class="card mb-4 shadow-sm card-animated" style="animation-delay: 0.5s;">
            <div class="card-header bg-primary text-white fw-bold">Change Password</div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input name="current_password" type="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input name="password" type="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input name="password_confirmation" type="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success px-4">Update Password</button>
                </form>
            </div>
        </div>

        <!-- Delete Account -->
        <div class="card shadow-sm card-animated" style="animation-delay: 0.7s;">
            <div class="card-header bg-danger text-white fw-bold">Delete Account</div>
            <div class="card-body">
                <p class="text-muted">
                    Once your account is deleted, all of its resources and data will be permanently deleted.
                </p>
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-danger px-4">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Placeholder for x-bootstrap-js component -->
    <x-bootstrap-js />
</body>
</html>
