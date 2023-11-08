<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogoutController;


class ProfileController extends Controller
{
   public function index()
   {
   }

   public function show($user)
   {
    $user = auth()->user();
    return view('profile.show',compact('user'));
   }

   public function edit($user)
   {
    $user = auth()->user();
    return view('profile.edit',compact('user'));
   }

   public function update(Request $request,$user)
   {
      $newLogin = $request->input('login');
      $newEmail = $request->input('email');

    $validated = $request->validate(
      [
       'login' => ['required','unique:users','min:5','max:50'],
       'email'=> ['required','unique:users','min:5','max:50']
      ]);
     if($newLogin !== Auth::user()->login && $newEmail !== Auth::user()->email)
     {
      DB::table('users')->where('login',session()->get('username'))->update(
         [
         'login' => $newLogin,
         'email' => $newEmail   
         ]);
      $logout = new LogoutController();
      return $logout->logout();
     }
     else
     {
      return back()->withErrors(['login' => 'Login and email cannot be the same as the previous ones']);
     }
   }

   public function destroy($user)
   {
    dd($user = auth()->user());
   }

   public function change_password($user)
   {
    $user = auth()->user();
    return view('profile.change_password',compact('user'));
   }

   public function update_password(Request $request,$user)
   {
    $currentPassword = $request->input('password');
    $newPassword = $request->input('new_password');
    $newPasswordConfirm = $request->input('new_password_confirm');
    $hashedNewPassword = Hash::make($newPassword);
    $validated = $request->validate(
      [
      'password' => ['required','max:50','min:8'],
       'new_password' => ['required','max:50','min:8','different:password'],
       'new_password_confirm' => ['same:new_password']
      ]);
      if(!Hash::check($currentPassword,Auth::user()->password))
      {
        return back()->withErrors(['password' => 'You entered the incorrect old password']);
      }
      else
      {
         DB::table('users')->where('login',session()->get('username'))->update(
            [
            'password' => $hashedNewPassword   
            ]);

         $logout = new LogoutController();
         return $logout->logout();
      }
   }

}
