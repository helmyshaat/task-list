<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = "Helmy Shaat";
    $departments = [
        "1"=> "Tichnical",
        "2"=> "Finanial",
        "3"=> "Sales",
    ];
    return view('about', compact("name" , "departments"));
});

Route::post('/about', function () {
    $name =$_POST['name'];
    $departments = [
        "1"=> "Tichnical",
        "2"=> "Finanial",
        "3"=> "Sales",
    ];
    return view('about', compact("name" , "departments"));
});

Route:: get('tasks', [TaskController::class, 'index' ]);
Route::post('create',[TaskController::class, 'create']);
Route::post('/delete/{id}' , [TaskController::class, 'destroy']);
Route::post('/edit/{id}', [TaskController::class, 'edit']);
Route::post('/update', [TaskController::class, 'update']);

Route::get('app' , function (){
    return view('layouts.app');
});

Route:: get('users', [UserController::class, 'index' ]);
Route::post('create_user',[UserController::class, 'create']);
Route::post('/delete_user/{id}' , [UserController::class, 'destroy']);
Route::post('/edit_user/{id}', [UserController::class, 'edit']);
Route::post('/update_user', [UserController::class, 'update']);
