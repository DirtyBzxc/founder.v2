<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(Request $request)
    {
       $players = Player::where('approved',false)->paginate(10);
       return view('admin.request',compact('players'));
    }
    public function store(Request $request)
    {
     $playerId = key($request->except('_token'));

     DB::table('players')->where('id',$playerId)->update(
        [
         'approved' => true
        ]);
        return redirect(route('admin.request'));
    }
}
