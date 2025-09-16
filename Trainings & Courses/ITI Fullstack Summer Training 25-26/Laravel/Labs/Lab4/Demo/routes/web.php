<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\CourseController;


Route::get('/', function () {
    return view('welcome');
});

// Students
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{id}',[StudentController::class,'show'])->name('students.view');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');

// Tracks
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
Route::get('/tracks/{id}', [TrackController::class, 'show'])->name('tracks.view');
Route::put('/tracks/{id}', [TrackController::class, 'update'])->name('tracks.update');
Route::get('/tracks/edit/{id}', [TrackController::class, 'edit'])->name('tracks.edit');
Route::delete('/tracks/{id}', [TrackController::class, 'destroy'])->name('tracks.destroy');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.view');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
