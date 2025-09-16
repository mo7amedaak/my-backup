<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', function () {
    $users = [
        [ "id" => 1, "name" => "php", "group" => 1 ],
        [ "id" => 2, "name" => "python", "group" => 3 ],
        [ "id" => 3, "name" => "react", "group" => 2 ],
        [ "id" => 4, "name" => "angular", "group" => 3 ],
        [ "id" => 5, "name" => "json", "group" => 1 ],
    ];
    return view('users', ['users' => $users]);
})->name('users.index');




Route::get('/users/{id}', function ($id) {
    $users = [
        [ "id" => 1, "name" => "php", "group" => 1 ],
        [ "id" => 2, "name" => "python", "group" => 3 ],
        [ "id" => 3, "name" => "react", "group" => 2 ],
        [ "id" => 4, "name" => "angular", "group" => 3 ],
        [ "id" => 5, "name" => "json", "group" => 1 ],
    ];

    $user = null;
    foreach ($users as $u) {
        if ($u['id'] == $id) {
            $user = $u;
            break;
        }
    }

    if ($user) {
        return view('userData', ['user' => $user]);
    } else {
        return view('error');
    }
})->where('id', '[0-9]+')->name('users.show');
