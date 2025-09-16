@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Job Board Logo" style="width:120px;height:120px;">
        </div>
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="fw-bold text-success mb-3" style="font-size:2.5rem;">About Job Board</h1>
            <p class="fs-5 text-muted mb-4">
                <span class="fw-bold text-success">Job Board</span> is your modern gateway to career success and smart hiring.<br>
                We connect talented candidates with top employers, making job search and recruitment easy, fast, and reliable.
            </p>
            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 mb-4">
                <span class="badge bg-success fs-6 px-3 py-2">For Candidates</span>
                <span class="badge bg-info fs-6 px-3 py-2">For Employers</span>
                <span class="badge bg-warning text-dark fs-6 px-3 py-2">For Admins</span>
            </div>
            <a href="{{ route('jobs.index') }}" class="btn btn-success btn-lg px-5">Browse Jobs</a>
        </div>
    </div>
    <div class="row mt-5 g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div style="font-size:2.5rem;">🔎</div>
                    <h5 class="fw-bold text-success mt-3 mb-2">Smart Search</h5>
                    <p class="text-muted">Find jobs by keywords, location, category, salary, and more with powerful filters.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div style="font-size:2.5rem;">💼</div>
                    <h5 class="fw-bold text-success mt-3 mb-2">Easy Applications</h5>
                    <p class="text-muted">Apply with your resume or contact info, and manage your profile and applications easily.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <div style="font-size:2.5rem;">✅</div>
                    <h5 class="fw-bold text-success mt-3 mb-2">Quality & Security</h5>
                    <p class="text-muted">Admin approval for every job, secure platform, and dedicated support for all users.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col text-center">
            <h4 class="fw-bold text-success mb-3">Why Choose Us?</h4>
            <p class="text-muted fs-5">
                Modern, responsive design &mdash; Powerful search &mdash; Secure & easy to use<br>
                Dedicated admin monitoring for quality and safety &mdash; Fast support
            </p>
        </div>
    </div>
</div>
@endsection