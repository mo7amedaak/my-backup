<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TrackController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
});

Route::middleware('track.api')->group(function () {
    Route::get('/tracks', [TrackController::class, 'index']);
    Route::get('/tracks/{id}', [TrackController::class, 'show']);
    Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);
    Route::put('/tracks/{id}', [TrackController::class, 'update']);
});

Route::middleware('course.api')->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
});

Route::post('/student/register', [AuthController::class, 'register']);
Route::post('/student/login', [AuthController::class, 'login']);