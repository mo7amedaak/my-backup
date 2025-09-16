<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Http\Middleware\TestToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','token'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.view');
Route::get('/students/update/{id}',[StudentController::class,'update'])->name('students.update');
Route::put('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::resource('tracks', TrackController::class);


//1
// Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware("auth");
//2
// Route::middleware('auth')->group(function(){
//  Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.view');
// Route::get('/students/update/{id}',[StudentController::class,'update'])->name('students.update');
// Route::put('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
// Route::resource('tracks', TrackController::class);
// });

//3  generate your middleware ( php artisan make:middleware Test)
// Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware(TestToken::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware("token");
// Route::get('/test', function () {
//     return "test middle ware";
// })->middleware('token');
Route::get('/test', function () {
    return view('test');
});
