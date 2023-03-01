<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create (Request $data){

        $data->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email'), 'email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $sec = bcrypt($data->password);

        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $sec
        ]);

        return redirect('/login')->with('message', 'Your acount has been succesfully created..')->with('title', ' login with your username or password');

    }

    public function login(Request $data){
        $usr = $data->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($usr)){
            session()->regenerate();
            return redirect('/');
        }else{
            // return back()->withErrors(['email' => 'Incorrect username or password'])->onlyInput('email');
            return back()->with('error', 'Incorrect username or password')->with('title', 'Oops you got this wrong :(');
        }
    }
    
    public function logout(Request $req){
        auth()->logout();
        $req->session()->regenerateToken();
        $req->session()->invalidate();

        return redirect('/')->with('message', 'User logged out succesfully');
    }
}
