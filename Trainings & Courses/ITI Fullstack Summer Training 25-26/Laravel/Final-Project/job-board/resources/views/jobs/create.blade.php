<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Job</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Google Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* ترتيب العناصر عموديًا */
        }
        .main-content {
            flex-grow: 1; /* يسمح للمحتوى الأساسي بملء المساحة المتاحة */
            display: flex;
            align-items: center; /* توسيط المحتوى عموديا داخل main-content */
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
    <!-- Placeholder for x-navbar component -->
    <x-navbar />

    <!-- Main content wrapper to handle layout -->
    <div class="main-content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-4 animated-fade-in" style="animation-delay: 0.3s;">
                        <div class="card-body p-4">

                            <h2 class="text-center mb-4 text-primary fw-bold animated-fade-in" style="animation-delay: 0.1s;">Create New Job</h2>

                            <form action="{{ route('jobs.store') }}" method="POST">
                                @csrf

                                <div class="mb-3 position-relative">
                                    <label class="form-label fw-semibold">Job Title</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-briefcase text-muted"></i></span>
                                        <input type="text" name="title" class="form-control border-start-0" required placeholder="e.g. Frontend Developer">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Description</label>
                                    <textarea name="description" class="form-control" rows="4" required placeholder="Describe the job..."></textarea>
                                </div>

                                <div class="mb-3 position-relative">
                                    <label class="form-label fw-semibold">Location</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-map-marker-alt text-muted"></i></span>
                                        <input type="text" name="location" class="form-control border-start-0" required placeholder="e.g. Cairo, Egypt">
                                    </div>
                                </div>

                                <div class="mb-3 position-relative">
                                    <label class="form-label fw-semibold">Salary</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-dollar-sign text-muted"></i></span>
                                        <input type="text" name="salary" class="form-control border-start-0" placeholder="e.g. 8000 - 12000 EGP">
                                    </div>
                                </div>

                                <div class="mb-4 position-relative">
                                    <label class="form-label fw-semibold">Job Type</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-user-tag text-muted"></i></span>
                                        <select name="type" class="form-select border-start-0" required>
                                            <option value="" disabled selected>Select job type</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Remote">Remote</option>
                                            <option value="Freelance">Freelance</option>
                                            <option value="Internship">Internship</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-grid d-md-flex justify-content-between gap-2">
                                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-4 rounded-pill">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Placeholder for x-footer component -->
    <x-footer />
    
    <!-- Bootstrap JS (optional, for some Bootstrap features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
