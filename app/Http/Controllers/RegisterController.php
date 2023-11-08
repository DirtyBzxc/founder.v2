<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index');
    }
    public function store(Request $request)
    {
      $login = $request->input('login');
      $email = $request->input('email');
      $password = $request->input('password');
      $password_confirm = $request->input('password_confirm');
      $hashed_password = Hash::make($password);
     
  
      $validated = $request->validate([
       'login' => ['required','unique:users','max:30','min:5'],
       'email' => ['required','unique:users','max:30','min:10'],
       'password' => ['required','max:50','min:8'],
       'password_confirm' => ['same:password']]);

       DB::table('users')->insert
       ([
        'login' => $login,
        'email' => $email,
        'password' => $hashed_password,
         'role' => 0
       ]);

       return view('login.index');
      
    }
}

