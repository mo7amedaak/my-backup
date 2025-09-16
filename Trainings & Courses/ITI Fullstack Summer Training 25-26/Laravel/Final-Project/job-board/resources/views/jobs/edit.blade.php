<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Job</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons (added for consistency) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

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
        .btn-primary, .btn-outline-secondary {
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
    <x-navbar />

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4 animated-fade-in" style="animation-delay: 0.3s;">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-4 text-primary fw-bold animated-fade-in" style="animation-delay: 0.1s;">Edit Job</h2>

                        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Job Title</label>
                                <input type="text" name="title" value="{{ $job->title }}" class="form-control" required>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ $job->description }}</textarea>
                            </div>

                            {{-- Type --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Job Type</label>
                                <select name="type" class="form-select" required>
                                    <option value="" disabled>Select job type</option>
                                    <option value="Full-time" {{ $job->type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ $job->type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Remote" {{ $job->type == 'Remote' ? 'selected' : '' }}>Remote</option>
                                    <option value="Freelance" {{ $job->type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                    <option value="Internship" {{ $job->type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                </select>
                            </div>

                            {{-- Location --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Location</label>
                                <input type="text" name="location" value="{{ $job->location }}" class="form-control">
                            </div>

                            {{-- Salary --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Salary</label>
                                <input type="number" name="salary" value="{{ $job->salary }}" class="form-control" step="0.01">
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">Update Job</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS (optional, for some Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <x-footer />
</body>
</html>
