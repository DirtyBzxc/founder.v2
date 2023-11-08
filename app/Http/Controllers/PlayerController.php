<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use App\helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isFalse;

class PlayerController extends Controller
{
    public function index(Request $request)
    {    
  
        $user = Auth::user();
        $players = Player::where('approved',true)->orderBy('created_at', 'desc')->paginate(10);
        $sort = $request->input('sort');
        if($sort)
        {
          $players = Player::where('rank',$sort)->where('approved',true)->paginate(10);
          $players->appends(['sort' => $sort]);
        }
  
        return view('player.index',compact('players','user','sort'));
        
    }

    public function create()
    {
      return view('player.create');
    }

    public function store(Request $request)
    {
      $nickname = $request->input('nickname');
      $rank = $request->input('rank');
      $role = $request->input('role');
      $age = $request->input('age');
      $link = $request->input('link');
      $description = $request->input('description');
      $contact = Helper::contact(request()->input('contact'));
      $user_id = Auth::user()->id;

      $request->validate(
      [
       "nickname" => ['required'],
       "rank" => ['required'],
       "role" => ['required'],
       "age" => ['required'],
       'link' => ['required'],
       'description' => ['required'],
       'contact' => ['required']       
      ]);
      
      DB::table('players')->insert
      (
      [
        'nickname' => $nickname,
        'rank' => $rank,
        'role' => $role,
        'age' => $age,
        'link' => $link,
        'description' => $description,
        'contact' => $contact,
        'user_id' => $user_id,
        'approved' => false
        
      ]
      );
    
     return redirect()->route('player.index');
    }

    public function edit($player)
    {
     $currentPlayer = Player::currentPlayer('nickname',$player);

     if(!Gate::allows('edit-player',$currentPlayer))
     {
      return redirect(route('player.index'));
     }
      return view('player.edit',compact('currentPlayer'));
    }

    public function update(Request $request,$player)
    {
     $newNickname = $request->input('nickname');
     $newRank = $request->input('rank');
     $newRole = $request->input('role');
     $newAge = $request->input('age');
     $newLink = $request->input('link');
     $newContact = $request->input('contact');
     $newDescription = $request->input('description');

     $validate = $request->validate(
      [
        "nickname" => ['required'],
        "rank" => ['required'],
        "role" => ['required'],
        "age" => ['required'],
        'link' => ['required'],
        'description' => ['required'],
        'contact' => ['required']
      ]);
      DB::table('players')->where('nickname',$player)->update(
        [
         'nickname' => $newNickname,
         'rank' => $newRank,
         'role' => $newRole,
         'age' => $newAge,
         'link' => $newLink,
         'contact' => $newContact,
         'description' => $newDescription
        ]);
        return redirect(route('player.index'));
    }

    public function show($player)
    {
     $currentPlayer = Player::currentPlayer('nickname',$player);

     if($currentPlayer->approved)
     {
      return view('player.show',compact('currentPlayer'));
     }
     else
     {
      return redirect(route('player.index'));
     }
    }
   
}
