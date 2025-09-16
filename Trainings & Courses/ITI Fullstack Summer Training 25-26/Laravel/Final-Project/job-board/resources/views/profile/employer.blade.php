<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile Page</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .list-group-item {
            background-color: transparent !important;
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
<body class="bg-light">
    <x-navbar />

    <div class="container py-4 flex-grow-1">
        <!-- Job Applications Section -->
        <h3 class="mb-4 text-primary fw-bold">Job Applications Received</h3>
        @if(session('success'))
            <div class="alert alert-success text-center card-animated" style="animation-delay: 0.1s;">{{ session('success') }}</div>
        @endif
        @if($applications->count())
            <div class="row g-4">
                @foreach($applications as $index => $app)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm card-animated" style="animation-delay: {{ 0.1 * ($index + 2) }}s;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">{{ $app->job->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $app->candidate->name }}</h6>
                                <p class="card-text small text-muted">Applied On: {{ $app->created_at->format('d M Y') }}</p>
                                
                                <div class="mb-3">
                                    <span class="fw-bold">Status:</span>
                                    @if($app->status == 'approved')
                                        <span class="badge bg-success ms-2">Approved</span>
                                    @elseif($app->status == 'rejected')
                                        <span class="badge bg-danger ms-2">Rejected</span>
                                    @else
                                        <span class="badge bg-warning text-dark ms-2">Pending</span>
                                    @endif
                                </div>
                                
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    @if($app->status == 'pending')
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('employer.applications.approve', $app->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Approve</button>
                                            </form>
                                            <form action="{{ route('employer.applications.reject', $app->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Reject</button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-muted small">No actions available</span>
                                    @endif

                                    @if($app->resume_name)
                                        <a href="{{ route('applications.download', $app->id) }}" class="btn btn-outline-primary btn-sm mt-2 mt-sm-0" target="_blank">
                                            <i class="fas fa-file-download me-1"></i> CV
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted fs-5 mt-4 card-animated">No applications received yet.</p>
        @endif

        <!-- Profile Settings Section -->
        <h3 class="mb-4 mt-5 text-primary fw-bold">Profile Settings</h3>
        <div class="row g-4">
            <!-- Update Profile -->
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm card-animated" style="animation-delay: 0.8s;">
                    <div class="card-header bg-primary text-white fw-bold">Update Profile Information</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" value="{{ old('name', $user->name) }}" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success rounded-pill px-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="col-12 col-lg-6">
                <div class="card shadow-sm card-animated" style="animation-delay: 1.0s;">
                    <div class="card-header bg-primary text-white fw-bold">Change Password</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input name="current_password" type="password" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input name="password" type="password" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input name="password_confirmation" type="password" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-success rounded-pill px-4">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Delete Account -->
            <div class="col-12">
                <div class="card shadow-sm card-animated" style="animation-delay: 1.2s;">
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
                                <input name="password" type="password" class="form-control" required />
                            </div>
                            <button type="submit" class="btn btn-danger rounded-pill px-4">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer placeholder -->
    <x-footer />

    <!-- Bootstrap JS -->
    <x-bootstrap-js />
</body>
</html>
