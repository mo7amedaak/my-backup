<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Dashboard\EmployerDashboardController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Dashboard\CandidateDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// dashboard routes

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'pendingJobs'])
    ->middleware(['auth','\App\Http\Middleware\AdminMiddleware::class'])
    ->name('admin.dashboard');

Route::get('/employer/dashboard', [JobController::class, 'index'])
    ->middleware(['auth','\App\Http\Middleware\EmployerMiddleware::class'])
    ->name('employer.dashboard');

Route::get('/candidate/dashboard', function () {
    return view('dashboard.candidateDashboard');
})->middleware(['auth','\App\Http\Middleware\CandidateMiddleware::class'])->name('candidate.dashboard');

// profiles routes

Route::middleware(['auth', '\App\Http\Middleware\AdminMiddleware::class'])->get('/admin/profile', function () {
    return view('profile.admin', ['user' => auth()->user()]);
})->name('admin.profile');

Route::middleware(['auth', '\App\Http\Middleware\EmployerMiddleware::class'])->get('/employer/profile', function () {
    return view('profile.employer', ['user' => auth()->user()]);
})->name('employer.profile');

Route::middleware(['auth', '\App\Http\Middleware\CandidateMiddleware::class'])->get('/candidate/profile', function () {
    return view('profile.candidate', ['user' => auth()->user()]);
})->name('candidate.profile');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Jobs

Route::get('/employer/dashboard/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/employer/dashboard/jobs/store',[JobController::class,'store'])->name('jobs.store');
Route::get('/employer/dashboard/jobs',[JobController::class,'index'])->name('jobs.index')->middleware(['auth','\App\Http\Middleware\EmployerMiddleware::class']);
Route::get('/employer/dashboard/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/employer/dashboard/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::get('/employer/dashboard/jobs/{id}',[JobController::class,'show'])->name('jobs.show');
Route::delete('/employer/dashboard/jobs/{id}',[JobController::class,'destroy'])->name('jobs.destroy');

// Static pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Admin job approval routes
Route::middleware(['auth', '\App\Http\Middleware\AdminMiddleware::class'])->group(function () {
    Route::get('/admin/dashboard/jobs/pending', [AdminDashboardController::class, 'pendingJobs'])->name('admin.jobs.pending');
    Route::post('/admin/dashboard/jobs/{job}/approve', [AdminDashboardController::class, 'approveJob'])->name('admin.jobs.approve');
    Route::post('/admin/dashboard/jobs/{job}/reject', [AdminDashboardController::class, 'rejectJob'])->name('admin.jobs.reject');
});


/// Candidate dashboard routes

Route::middleware(['auth', '\App\Http\Middleware\CandidateMiddleware::class'])->group(function () {
    Route::get('/candidate/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard');
    Route::get('/candidate/jobs/{id}', [CandidateDashboardController::class, 'show'])->name('candidate.jobs.show');
});

// Application routes
Route::middleware(['auth', '\App\Http\Middleware\CandidateMiddleware::class'])
    ->post('/candidate/dashboard/jobs/{job}', [ApplicationController::class, 'apply'])
    ->name('applications.store');


Route::middleware(['auth', '\App\Http\Middleware\EmployerMiddleware::class'])
    ->get('/applications/{application}/download', [ApplicationController::class, 'download'])
    ->name('applications.download');

Route::middleware(['auth', '\App\Http\Middleware\CandidateMiddleware::class'])->group(function () {
    Route::get('/candidate/profile', [ProfileController::class, 'profile'])->name('candidate.profile');
    Route::delete('/candidate/applications/{id}', [ApplicationController::class, 'destroy'])->name('candidate.applications.cancel');
});

Route::middleware(['auth', '\App\Http\Middleware\EmployerMiddleware::class'])
    ->get('/employer/profile', [ProfileController::class, 'employerProfile'])
    ->name('employer.profile');

Route::middleware(['auth', '\App\Http\Middleware\EmployerMiddleware::class'])->group(function () {
    Route::post('/employer/applications/{application}/approve', [ApplicationController::class, 'approve'])->name('employer.applications.approve');
    Route::post('/employer/applications/{application}/reject', [ApplicationController::class, 'reject'])->name('employer.applications.reject');
});

// notifications routes

Route::post('/notifications/mark-as-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['success' => true]);
})->name('notifications.markAsRead');



require __DIR__.'/auth.php';
