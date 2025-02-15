<?php

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
