<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.view');
Route::get('/students/update/{id}',[StudentController::class,'update'])->name('students.update');
Route::put('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
Route::resource('tracks', TrackController::class);
