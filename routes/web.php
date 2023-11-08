<?php

use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\AbsentPlayer;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AlreadyAuthed;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\EditPlayerCheck;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\RoleCheck;

Route::get('welcome',function()
{
 return view('welcome.index');
})->name('welcome.index');

Route::redirect('/', '/welcome', 301);


/// Route for admin
Route::prefix('admin')->group(function (){
Route::get('/',[AdminController::class,'index'])->name('admin.index')->middleware(AuthCheck::class)->middleware(RoleCheck::class);
Route::get('users',[ListController::class,'index'])->name('admin.list')->middleware(AuthCheck::class)->middleware(RoleCheck::class);

Route::get('requests',[RequestController::class,'index'])->name('admin.request')->middleware(AuthCheck::class)->middleware(RoleCheck::class);
Route::post('requests',[RequestController::class,'store'])->name('admin.request.store')->middleware(AuthCheck::class)->middleware(RoleCheck::class);

Route::get('role',[RoleController::class,'index'])->name('admin.role')->middleware(AuthCheck::class)->middleware(RoleCheck::class)->middleware(AdminCheck::class);
Route::post('role',[RoleController::class,'store'])->name('admin.role.store')->middleware(AuthCheck::class)->middleware(RoleCheck::class)->middleware(AdminCheck::class);
});



// Routes for player

Route::get('players',[PlayerController::class,'index'])->name('player.index');

Route::get('players/create',[PlayerController::class,'create'])->name('player.create')->middleware(AuthCheck::class)->middleware(AbsentPlayer::class);

Route::post('players',[PlayerController::class,'store'])->name('player.store')->middleware(AuthCheck::class);

Route::get('players/{player}',[PlayerController::class,'show'])->name('player.show')->middleware(AuthCheck::class);

Route::get('players/{player}/edit',[PlayerController::class,'edit'])->name('player.edit');

Route::put('players/{player}',[PlayerController::class,'update'])->name('player.update')->middleware(AuthCheck::class);


// Route for teams

Route::get('teams',[TeamController::class,'index'])->name('team.index');


// Routes for register

Route::get('register',[RegisterController::class,'index'])->name('register.index')->middleware(AlreadyAuthed::class);

Route::post('register',[RegisterController::class,'store'])->name('register.store')->middleware(AlreadyAuthed::class);


// Routes for login

Route::get('login',[LoginController::class,'index'])->name('login.index')->middleware(AlreadyAuthed::class);

Route::post('login',[LoginController::class,'store'])->name('login.store')->middleware(AlreadyAuthed::class);

Route::get('logout',[LogoutController::class,'logout'])->name('login.logout');


// Route for profile


Route::get('profile/{user}',[ProfileController::class,'show'])->name('profile.show')->middleware(AuthCheck::class);

Route::get('profile/{user}/edit',[ProfileController::class,'edit'])->name('profile.edit')->middleware(AuthCheck::class);

Route::put('profile/{user}',[ProfileController::class,'update'])->name('profile.update')->middleware(AuthCheck::class);

Route::delete('profile/{user}',[ProfileController::class,'destroy'])->name('profile.destroy')->middleware(AuthCheck::class);

Route::get('profile/{user}/change_password',[ProfileController::class,'change_password'])->name('profile.change_password')->middleware(AuthCheck::class);

Route::put('profile/{user}/change_password',[ProfileController::class,'update_password'])->name('profile.update_password')->middleware(AuthCheck::class);


