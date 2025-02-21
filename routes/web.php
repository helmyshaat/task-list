<?php


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

Route:: get('tasks', function () {
    $tasks = DB::table('tasks')->get();

    return view('tasks' , compact('tasks'));
});


Route::post('create', function () {
    $task_name = $_POST['name'];
DB:: table('tasks')->insert(
    [
        'name' => $task_name
    ]
);
    return redirect()->back();
});

Route::post('/delete/{id}' , function ($id){
    DB::table('tasks')->where('id' ,$id )->delete();
    return redirect()->back();
});

Route::post('/edit/{id}', function ($id){
    $task  = DB::table('tasks')->where('id' ,$id )->get()->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks' , compact('tasks' , 'task'));
});

Route::post('/update', function (){
    DB::table('tasks')->where('id' ,$_POST['id'] )->update(
        [
            'name' => $_POST['name']
        ]
    );

    return redirect('tasks');
});
