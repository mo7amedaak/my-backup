<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
// Route:method ('url,(){})
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/users', function () {
//     $users =
//         [

//             [

//                 "id" => 1,
//                 "name" => "php",
//                 "group" => 1
//             ],
//             [

//                 "id" => 2,
//                 "name" => "python",
//                 "group" => 3
//             ],
//             [

//                 "id" => 3,
//                 "name" => "react",
//                 "group" => 2
//             ],

//         ];
//           //      viewName ==> Data
//     return view('users', ['users' => $users]);
// });
// Route::get('/users/{id}', function ($id) {
//     $users =
//         [

//             [

//                 "id" => 1,
//                 "name" => "php",
//                 "group" => 1
//             ],
//             [

//                 "id" => 2,
//                 "name" => "python",
//                 "group" => 3
//             ],
//             [

//                 "id" => 3,
//                 "name" => "react",
//                 "group" => 2
//             ],

//         ];
//     if ($id < count($users)) {
//                       // viewName  ==> Data
//         return  view('userData',['user'=>$users[$id]]);
//     } else {
//         return view('error');
//         // return abort(404);
//     }
// })->where('id','[0-9]+');

///====================================>

// Route::method('url',[ControllerName::class,'function']);
// Route::get('/students',[StudentController::class,'getStudents'])->name();
// Route::get('/students/{id}',[StudentController::class,'getStudentData']);
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.view');
Route::get('/students/update/{id}',[StudentController::class,'update'])->name('students.update');
Route::put('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
// ==============================>
//route::resource
Route::resource('tracks', TrackController::class);
/**
 *  POST            _ignition/update-config .. ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController
 *  POST            student/store ........................................... students.store › StudentController@store
 * GET|HEAD        students ................................................ students.index › StudentController@index
 * GET|HEAD        students/create ....................................... students.create › StudentController@create
 * PUT             students/edit/{id} ........................................ students.edit › StudentController@edit
 * GET|HEAD        students/update/{id} .................................. students.update › StudentController@update
 * DELETE          students/{id} ....................................... students.destroy › StudentController@destroy
 * GET|HEAD        students/{id} ............................................. students.view › StudentController@show
 * =================================== TRack Routes ============================
 *  method of route  url                            name            function in controller
 * GET|HEAD        tracks ..................... tracks.index › TrackController@index
 * POST            tracks ...................................................... tracks.store › TrackController@store
 * GET|HEAD        tracks/create ............................................. tracks.create › TrackController@create
 * GET|HEAD        tracks/{track} ................................................ tracks.show › TrackController@show
 * PUT|PATCH       tracks/{track} ............................................ tracks.update › TrackController@update
 * DELETE          tracks/{track} .......................................... tracks.destroy › TrackController@destroy
 * GET|HEAD        tracks/{track}/edit ........................................... tracks.edit › TrackController@edit
 * GET|HEAD        up ...............................................................................................


 */



// // Students
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/student/store',[StudentController::class,'store'])->name('students.store');
// Route::get('/students',[StudentController::class,'index'])->name('students.index');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route::get('/students/{id}',[StudentController::class,'show'])->name('students.view');
// Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');

// // Tracks
// Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
// Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
// Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
// Route::get('/tracks/{id}', [TrackController::class, 'show'])->name('tracks.view');
// Route::put('/tracks/{id}', [TrackController::class, 'update'])->name('tracks.update');
// Route::get('/tracks/edit/{id}', [TrackController::class, 'edit'])->name('tracks.edit');
// Route::delete('/tracks/{id}', [TrackController::class, 'destroy'])->name('tracks.destroy');

// // Courses
// Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
// Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
// Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
// Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.view');
// Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
// Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
// Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
