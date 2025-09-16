<?php

use App\Http\Controllers\StudentController;
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
