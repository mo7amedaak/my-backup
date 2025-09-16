<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Dashboard</title>

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
        
        .form-control, .form-select {
            border-radius: 50px;
        }
        .btn {
            border-radius: 50px;
        }
    </style>
</head>
<body class="bg-light">
<x-navbar />

<div class="container py-5">
    <h1 class="mb-4 text-primary fw-bold">Candidate Dashboard</h1>
    
    {{-- Search Form --}}
    <form method="GET" action="{{ route('candidate.dashboard') }}" class="row g-3 mb-4 card p-4 shadow-sm">
        <div class="col-md-3">
            <input type="text" name="keyword" class="form-control" placeholder="Keyword"
                   value="{{ request('keyword') }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="location" class="form-control" placeholder="Location"
                   value="{{ request('location') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="salary" class="form-control" placeholder="Min Salary"
                   value="{{ request('salary') }}" min="0" step="100" />
        </div>
        <div class="col-md-3">
            <select name="job_type" class="form-select">
                <option value="">Select Job Type</option>
                <option value="freelance" {{ request('job_type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
                <option value="fulltime" {{ request('job_type') == 'fulltime' ? 'selected' : '' }}>Full Time</option>
                <option value="parttime" {{ request('job_type') == 'parttime' ? 'selected' : '' }}>Part Time</option>
                <option value="remote" {{ request('job_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="internship" {{ request('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-search me-1"></i> Search
            </button>
            <a href="{{ route('candidate.dashboard') }}" class="btn btn-outline-secondary px-3">
                <i class="fas fa-redo"></i>
            </a>
        </div>
    </form>

    {{-- Job Listings --}}
    <h2 class="mb-3 text-secondary">Available Jobs</h2>
    
    <div class="row g-4">
        @forelse ($jobs as $index => $job)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animated" style="animation-delay: {{ 0.1 * ($index + 1) }}s;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">{{ $job->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <i class="fas fa-building me-1"></i> {{ $job->employer->name ?? 'N/A' }}
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <i class="fas fa-map-marker-alt me-1"></i> {{ $job->location }}
                        </h6>
                        
                        <div class="d-flex flex-wrap gap-2 my-3">
                             @php
                                $typeColors = [
                                    'freelance' => 'badge bg-warning text-dark',
                                    'fulltime' => 'badge bg-success',
                                    'parttime' => 'badge bg-info text-dark',
                                    'remote' => 'badge bg-primary',
                                    'internship' => 'badge bg-secondary',
                                ];
                            @endphp
                            <span class="{{ $typeColors[$job->job_type] ?? 'badge bg-light text-dark' }}">{{ ucfirst($job->job_type) }}</span>
                            @if($job->salary_min)
                                <span class="badge bg-light text-dark">
                                    <i class="fas fa-dollar-sign"></i> {{ number_format($job->salary_min) }}
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('candidate.jobs.show', $job->id) }}" class="btn btn-sm btn-primary me-2">View Details</a>
                        
                        <form action="{{ route('applications.store', $job->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <div class="input-group mt-3">
                                <input type="file" name="resume" class="form-control form-control-sm" required>
                                <button type="submit" class="btn btn-sm btn-success px-3">Apply</button>
                            </div>
                            @error('resume')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                            @if(session('success_job_id') == $job->id)
                                <small class="text-success mt-1 d-block">{{ session('success_message') }}</small>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted fs-5 mt-4 card-animated">No jobs available at the moment.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>

</div>

<x-bootstrap-js />
<x-footer />
</body>
</html>
