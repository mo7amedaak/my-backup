<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        .btn {
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
        .footer {
            flex-shrink: 0;
            width: 100%;
            padding: 1rem 0;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            text-align: center;
        }
        /* Typing animation styles */
        #greeting {
            min-height: 30px;
        }
        #greeting-text::after {
            content: '|';
            animation: blink 1s infinite;
        }
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>
<body class="bg-light">
    <!-- Placeholder for x-navbar component -->
    <x-navbar />

    <div class="content container py-4">

        <h1 class="mb-2 text-primary fw-bold">Admin Dashboard</h1>
        <div id="greeting" class="fs-4 text-muted mb-4 card-animated" style="animation-delay: 0.2s;">
            <span id="greeting-text"></span>
        </div>

        <!-- Quick Stats Section -->
        <h2 class="mb-3 text-secondary fw-bold card-animated" style="animation-delay: 0.4s;">Quick Stats</h2>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card bg-success text-white card-animated" style="animation-delay: 0.6s;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users fa-3x me-3"></i>
                            <div>
                                <h5 class="card-title fw-bold">Total Candidates</h5>
                                <h3 class="card-text">1,234</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white card-animated" style="animation-delay: 0.7s;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building fa-3x me-3"></i>
                            <div>
                                <h5 class="card-title fw-bold">Total Employers</h5>
                                <h3 class="card-text">567</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark card-animated" style="animation-delay: 0.8s;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-briefcase fa-3x me-3"></i>
                            <div>
                                <h5 class="card-title fw-bold">Active Jobs</h5>
                                <h3 class="card-text">890</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Job Analytics Chart -->
        <h2 class="mb-3 mt-5 text-secondary fw-bold card-animated" style="animation-delay: 0.9s;">Job Analytics</h2>
        <div class="card mb-5 p-4 shadow-sm card-animated" style="animation-delay: 1s;">
            <canvas id="jobsChart"></canvas>
        </div>

        <!-- Pending Jobs Section -->
        <h2 class="mb-3 text-secondary fw-bold card-animated" style="animation-delay: 1.1s;">Pending Jobs</h2>
        
        <div class="row g-4">
            @forelse($jobs as $index => $job)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-animated" style="animation-delay: {{ 0.1 * ($index + 12) }}s;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-dark">{{ $job->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <i class="fas fa-building me-1"></i> {{ $job->employer->name ?? 'N/A' }}
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $job->location }}
                            </h6>
                            
                            <div class="my-3">
                                <span class="badge bg-warning text-dark">{{ ucfirst($job->status) }}</span>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check me-1"></i> Approve
                                    </button>
                                </form>
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                                <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times me-1"></i> Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted fs-5 mt-4 card-animated" style="animation-delay: 1.2s;">No pending jobs found.</p>
            @endforelse
            <div class="d-flex justify-content-center mt-4">
                {{ $jobs->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>


    <!-- Placeholder for x-bootstrap-js component -->
    <x-bootstrap-js />

    <script>
        // Chart.js data
        const jobsData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Jobs Posted',
                backgroundColor: 'rgba(60, 141, 188, 0.7)',
                borderColor: 'rgba(60, 141, 188, 1)',
                borderWidth: 1,
                data: [15, 25, 30, 28, 45, 35], // dummy data
            }]
        };

        // Chart.js options
        const jobsOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false,
        };

        // Render the chart
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('jobsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: jobsData,
                options: jobsOptions,
            });
        });

        // Typing animation script
        function typeWriter(text, element, speed) {
            let i = 0;
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                } else {
                    setTimeout(() => eraseWriter(text, element, speed), 2000);
                }
            }
            type();
        }

        function eraseWriter(text, element, speed) {
            let i = text.length;
            function erase() {
                if (i >= 0) {
                    element.innerHTML = text.substring(0, i);
                    i--;
                    setTimeout(erase, speed);
                } else {
                    setTimeout(() => typeWriter(text, element, speed), 1000);
                }
            }
            erase();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const greetingElement = document.getElementById('greeting-text');
            // FIX: Replaced hardcoded "Admin" with dynamic user name
            const adminName = "{{ Auth::user()->name ?? 'Admin' }}";
            const greetingText = `Hello, ${adminName}!`;
            typeWriter(greetingText, greetingElement, 75);
        });
    </script>
    <x-footer />
</body>
</html>
