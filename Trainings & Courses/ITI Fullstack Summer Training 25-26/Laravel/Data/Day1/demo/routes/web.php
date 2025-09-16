<?php

use Illuminate\Support\Facades\Route;
// Route:method ('url,(){})
Route::get('/', function () {
    return view('welcome');
});
Route::get('/users', function () {
    $users =
        [

            [

                "id" => 1,
                "name" => "php",
                "group" => 1
            ],
            [

                "id" => 2,
                "name" => "python",
                "group" => 3
            ],
            [

                "id" => 3,
                "name" => "react",
                "group" => 2
            ],

        ];
          //      viewName ==> Data
    return view('users', ['users' => $users]);
});


Route::get('/users/{id}', function ($id) {
    $users =
        [

            [

                "id" => 1,
                "name" => "php",
                "group" => 1
            ],
            [

                "id" => 2,
                "name" => "python",
                "group" => 3
            ],
            [

                "id" => 3,
                "name" => "react",
                "group" => 2
            ],

        ];
    if ($id < count($users)) {
                      // viewName  ==> Data
        return  view('userData',['user'=>$users[$id]]);
    } else {
        return view('error');
        // return abort(404);
    }
})->where('id','[0-9]+');
