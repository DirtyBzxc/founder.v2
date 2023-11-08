<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request)
    {
       $players = Player::paginate(10);
       $users = User::all();
       return view('admin.list',compact('players','users'));

    }
}
