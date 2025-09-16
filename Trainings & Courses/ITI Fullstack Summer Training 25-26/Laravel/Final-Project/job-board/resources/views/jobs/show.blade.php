<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
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
        .list-group-item {
            border: none;
            border-bottom: 1px solid #e9ecef;
            background: transparent !important;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .list-group-item span {
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .btn-outline-secondary {
            border-radius: 50px;
        }
        /* Fade-in animation for elements */
        .animated-fade-in {
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
    <!-- Navbar placeholder -->
    <x-navbar />

    <!-- Main container -->
    <div class="main-content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4 animated-fade-in" style="animation-delay: 0.3s;">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="text-center mb-4 text-primary fw-bold animated-fade-in" style="animation-delay: 0.1s;">Job Details</h2>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item bg-white">
                                    <div class="fw-bold text-muted mb-1">Title:</div>
                                    <span>{{ $job->title }}</span>
                                </li>
                                <li class="list-group-item bg-white">
                                    <div class="fw-bold text-muted mb-1">Description:</div>
                                    <span class="text-wrap">{{ $job->description }}</span>
                                </li>
                                <li class="list-group-item bg-white">
                                    <div class="fw-bold text-muted mb-1">Location:</div>
                                    <span>{{ $job->location }}</span>
                                </li>
                                <li class="list-group-item bg-white">
                                    <div class="fw-bold text-muted mb-1">Salary:</div>
                                    <span>{{ $job->salary }} $</span>
                                </li>
                                <li class="list-group-item bg-white">
                                    <div class="fw-bold text-muted mb-1">Posted By:</div>
                                    <span>{{ $job->employer->name ?? 'N/A' }}</span>
                                </li>
                            </ul>
                            <div class="text-center mt-4">
                                @php
                                    $role = Auth::user()->role;
                                    $backRoute = match($role) {
                                        'admin' => route('admin.dashboard'),
                                        'candidate' => route('candidate.dashboard'),
                                        'employer' => route('employer.dashboard'),
                                    };
                                @endphp
                                <a href="{{ $backRoute }}" class="btn btn-outline-secondary px-5 rounded-pill">
                                    ← Back to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer placeholder -->
    <x-footer />

    <!-- Bootstrap JS (optional, for some Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
