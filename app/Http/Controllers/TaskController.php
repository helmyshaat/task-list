<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index() {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks' , compact('tasks'));
    }

    public function create() {
        $task_name = $_POST['name'];
    // DB:: table('tasks')->insert(
    //     [
    //         'name' => $task_name
    //     ]
    // );
    $task = new  Task();
    $task->name = $task_name;
    $task->save();
        return redirect()->back();
    }

    public function destroy ($id){
        // DB::table('tasks')->where('id' ,$id )->delete();
        Task::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        // $task  = DB::table('tasks')->where('id' ,$id )->get()->first();
        $task  = Task::find($id);
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks' , compact('tasks' , 'task'));
    }

    public function update(){
        // DB::table('tasks')->where('id' ,$_POST['id'] )->update(
        //     [
        //         'name' => $_POST['name']
        //     ]
        // );
        $task = Task::find($_POST['id']);
        $task->name = $_POST['name'];
        $task->save();
        return redirect('tasks');
    }
}
