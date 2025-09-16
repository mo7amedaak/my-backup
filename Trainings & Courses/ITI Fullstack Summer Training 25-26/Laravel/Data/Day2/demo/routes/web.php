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

/**
 * MVC ==> DB: model  ==> php artisan make:model Student =>https://laravel.com/docs/11.x/eloquent
 * ==============> Connection ==> model , DB ==> model مفرد table جمع   == > same Name
 * Logic ==> Controller  ===> Function
 * =========> Create Controller ==> php artisan make:controller StudentsController
 *
 *
 *
 * FRont ==> View
 *
 *
 * Routes ==> URL ==> Request
 * get Data==> get
 * Send Data==> post
 * Update data ==> put
 * Delete Data ==> delete
 *
 * =========================> Resource ===> generate all functions in controller
 * =========> php artisan make:controller TrackController -r
 * ===> create model ==> controller => resource
 * 1- create model ==> php artisan make:model Track
 * 2- ===> create controller ==> php artisan make:controller TrackController --model=Track -r
 *
 * ===============================================================>
 * create model + create controller + resource
 * php artisan make:model Track -c -r  ===> -c:controller , -r: resource
 *
 *
 * ==================================
 * 419 ==> page expired ====>
 * delete ===> change on data ===> access
 * token ===> input : hidden ==> password 
 */



///====================================>

// Route::method('url',[ControllerName::class,'function']);
// Route::get('/students',[StudentController::class,'getStudents'])->name();
// Route::get('/students/{id}',[StudentController::class,'getStudentData']);
Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');
Route::get('/students/{id}',[StudentController::class,'show'])->name('students.view');
