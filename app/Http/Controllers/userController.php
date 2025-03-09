<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // $users = DB::table('users')->get();
        $users = User::all();

        return view('users' , compact('users'));
    }

    public function create() {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_pass = $_POST['password'];
    // DB:: table('users')->insert(
    //     [
    //         'name' => $user_name,
    //         'email' => $user_email,
    //         'password' => $user_pass
    //     ]
    // );
        $user = new User();
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = $user_pass;
        $user->save();
        return redirect()->back();
    }

    public function destroy ($id){
        // DB::table('users')->where('id' ,$id )->delete();
        User::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        // $user  = DB::table('users')->where('id' ,$id )->get()->first();
        // $users = DB::table('users')->get();
        $user  = User::find($id);
        $users = User::all();
        return view('users' , compact('users' , 'user'));
    }

    public function update(){
        // DB::table('users')->where('id' ,$_POST['id'] )->update(
        //     [
        //         'name' => $_POST['name'],
        //         'email' => $_POST['email'],
        //         'password' => $_POST['password'],
        //     ]
        // );
        $user = User::find($_POST['id']);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect('users');
    }
}
