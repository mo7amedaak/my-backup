<?php

use App\Http\Controllers\Api\StudentAuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Student Authentication Routes
Route::post('/student/login', [StudentAuthController::class, 'login']);
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/student/profile', [StudentAuthController::class, 'profile'])->middleware('auth:sanctum');

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('tracks', TrackController::class);
});