<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-light">
<x-navbar />

<div class="container py-5">
    <div class="fade-in-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-primary">Your Posted Jobs</h2>
                <p class="text-muted">Manage all your job listings from here</p>
            </div>
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">+ Add New Job</a>
        </div>

        @if($jobs->count())
            <div class="row g-4">
                @foreach($jobs as $job)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-lg border-0 rounded-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary mb-2">{{ $job->title }}</h5>

                                <p class="mb-1 text-muted"><strong>Type:</strong> {{ $job->type ?? 'N/A' }}</p>
                                <p class="mb-1 text-muted"><strong>Status:</strong>
                                    <span class="badge 
                                        {{ $job->status == 'approved' ? 'bg-success' : 
                                        ($job->status == 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ ucfirst($job->status) }}
                                    </span>
                                </p>

                                <p class="text-muted small mt-2">Posted on {{ $job->created_at->format('F d, Y') }}</p>

                                <div class="d-flex gap-2 mt-4">
                                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-outline-primary btn-sm flex-grow-1">View</a>
                                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-outline-secondary btn-sm flex-grow-1">Edit</a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm flex-grow-1"
                                                onclick="return confirm('Are you sure you want to delete this job?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $jobs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="alert alert-info text-center shadow-lg rounded-4">
                You haven't posted any jobs yet.
            </div>
        @endif
    </div>
</div>

<x-footer />



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.fade-in-section');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, {
            threshold: 0.1
        });

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script>
</body>
</html>
