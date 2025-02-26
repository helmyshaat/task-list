<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $users = DB::table('users')->get();

        return view('users' , compact('users'));
    }

    public function create() {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_pass = $_POST['password'];
    DB:: table('users')->insert(
        [
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_pass
        ]
    );
        return redirect()->back();
    }

    public function destroy ($id){
        DB::table('users')->where('id' ,$id )->delete();
        return redirect()->back();
    }

    public function edit($id){
        $user  = DB::table('users')->where('id' ,$id )->get()->first();
        $users = DB::table('users')->get();
        return view('users' , compact('users' , 'user'));
    }

    public function update(){
        DB::table('users')->where('id' ,$_POST['id'] )->update(
            [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ]
        );

        return redirect('users');
    }
}
