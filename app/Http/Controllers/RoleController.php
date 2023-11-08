<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role');
    }
    public function store(Request $request)
    {
     $username = $request->input('username');
     $role = $request->input('role');
     
     $request->validate(
        [
         "username" => ['required'],
         "role" => ['required']
        ]);

        DB::table('users')->where('login',$username)->update(
            [
             'role' => $role
            ]);
            return redirect(route('admin.index'));
    }
}
