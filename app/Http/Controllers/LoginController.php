<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(User $user)
    {  

        return view('login.index');
    }
    public function store(Request $request, User $user)
    {
     $user =
     [
        'email' => $request->input('email'),
        'password' => $request->input('password')
     ];

     $validated = $request->validate(
        [
         'email' => ['required']
        ]);

     if(Auth::attempt($user))
     {

      session()->put('username',Auth::user()->login);
      return redirect('players');
     }
     else
     {
         return back()->withErrors(['email' => 'Invalid username or password']);
     }
    }
    
}
