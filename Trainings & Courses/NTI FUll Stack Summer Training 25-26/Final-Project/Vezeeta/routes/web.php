<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ClinicController;

use Illuminate\Support\Facades\Route;

Route::get('/', [DoctorController::class, 'welcome']);



Route::get('/dashboard/patient', function () {
    return view('dashboard.patient');
})->middleware(['auth', 'verified'])->name('dashboard.patient');

Route::get('/dashboard/admin', [DoctorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('clinics', ClinicController::class);
    Route::resource('doctors', DoctorController::class);
});

Route::get('/doctors/{doctor}', [BookingController::class, 'show'])->name('doctors.show');

Route::get('/book', [BookingController::class, 'create'])->name('book.create');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');


require __DIR__.'/auth.php';
