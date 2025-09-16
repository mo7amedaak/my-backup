<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board | Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom CSS for animations and styling */
        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            transition-delay: 0.1s;
        }
        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .company-logo {
            filter: grayscale(100%);
            transition: all 0.3s ease;
            max-height: 50px;
        }
        .company-logo:hover {
            filter: grayscale(0%);
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                Job Board
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/employer/dashboard') }}" class="btn btn-primary fw-bold">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 fw-bold">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary fw-bold">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-primary text-white text-center pt-5 pb-5 mt-5 rounded-bottom-4 shadow-sm">
        <div class="container fade-in-section">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" width="90" height="90">
            <h1 class="display-4 fw-bold mt-3 mb-2">
                <span id="typed-text"></span>
            </h1>
            <p class="lead mb-4">
                The modern platform for <span class="fw-bold">Employers</span>, <span class="fw-bold">Candidates</span>, and <span class="fw-bold">Admins</span>.<br>
                Post jobs, apply, and manage everything in one place!
            </p>
        </div>
    </section>

    <section class="py-5 bg-white">
    <div class="container fade-in-section">
        <h5 class="text-center text-muted fw-normal mb-4">Trusted by over 100+ leading companies</h5>
        <div class="row align-items-center justify-content-center g-4">
            <div class="col-6 col-md-2 text-center">
                <img src="https://img.icons8.com/color/48/google-logo.png" alt="Google" class="img-fluid company-logo">
            </div>
            <div class="col-6 col-md-2 text-center">
                <img src="https://img.icons8.com/color/48/microsoft.png" alt="Microsoft" class="img-fluid company-logo">
            </div>
            <div class="col-6 col-md-2 text-center">
                <img src="https://img.icons8.com/color/48/slack-new.png" alt="Slack" class="img-fluid company-logo">
            </div>
            
            <div class="col-6 col-md-2 text-center">
                <img src="https://img.icons8.com/color/48/paypal.png" alt="PayPal" class="img-fluid company-logo">
            </div>
        </div>
    </div>
</section>

    <section class="container my-5">
        <div class="text-center mb-5 fade-in-section">
            <h2 class="fw-bold text-primary">Why Job Board?</h2>
        </div>
        <div class="row g-4 fade-in-section">
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-2 text-success">📝</div>
                    <h5 class="fw-bold mt-3">Easy Job Posting</h5>
                    <p class="text-muted">Employers can post and manage jobs with detailed info and branding.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-2 text-success">🔍</div>
                    <h5 class="fw-bold mt-3">Smart Search</h5>
                    <p class="text-muted">Candidates search jobs by keywords, location, category, salary, and more.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-2 text-success">💼</div>
                    <h5 class="fw-bold mt-3">Apply & Connect</h5>
                    <p class="text-muted">Apply with your resume, contact employers, and get notified instantly.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="text-center mb-5 fade-in-section">
            <h2 class="fw-bold text-primary">How It Works</h2>
        </div>
        <div class="row g-4 fade-in-section">
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-1 text-primary">1</div>
                    <h5 class="fw-bold mt-3">Create Your Account</h5>
                    <p class="text-muted">Sign up in minutes and set up your profile as an employer or a candidate.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-1 text-primary">2</div>
                    <h5 class="fw-bold mt-3">Search or Post Jobs</h5>
                    <p class="text-muted">Browse thousands of job listings or post a new job to find qualified talent.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 rounded-4 shadow-sm text-center">
                    <div class="fs-1 text-primary">3</div>
                    <h5 class="fw-bold mt-3">Apply & Get Hired</h5>
                    <p class="text-muted">Submit your application and connect with employers to land your next job.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-white fade-in-section" style="background: linear-gradient(135deg, #198754, #0d6efd);">
        <div class="container text-center">
            <div class="row g-4">
                <div class="col-md-3">
                    <h2 class="fw-bold">10K+</h2>
                    <p>Jobs Listed</p>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">5K+</h2>
                    <p>Companies</p>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">20K+</h2>
                    <p>Applicants</p>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">98%</h2>
                    <p>Success Rate</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light fade-in-section">
        <div class="container text-center">
            <h2 class="fw-bold mb-4 text-primary">What Our Users Say</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white border-start border-4 border-primary h-100">
                        <p>"This platform helped me land my dream job in just 2 weeks!"</p>
                        <small class="text-muted">- Sarah M.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white border-start border-4 border-success h-100">
                        <p>"The best job board I've ever used, hands down."</p>
                        <small class="text-muted">- John D.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 shadow-sm rounded bg-white border-start border-4 border-warning h-100">
                        <p>"I hired 3 amazing employees thanks to this site."</p>
                        <small class="text-muted">- Emma L.</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white text-center fade-in-section">
        <div class="container">
            <h2 class="fw-bold mb-3">Ready to find your next great hire or your dream job?</h2>
            <p class="lead mb-4">Join our community of thousands of employers and candidates today!</p>
            <a href="#" class="btn btn-light btn-lg fw-bold rounded-pill">Get Started Today!</a>
        </div>
    </section>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    
    <script>
        // Typing animation for the hero text
        var typed = new Typed('#typed-text', {
            strings: ['Find Your Dream Job', 'Hire Top Talent', 'Join Our Community'],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true,
            showCursor: true,
            cursorChar: '|',
        });

        // Fade-in animation on scroll
        const fadeInSections = document.querySelectorAll('.fade-in-section');
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        fadeInSections.forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>