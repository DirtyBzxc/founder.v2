<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
     {
        return view('admin.index');
     }
}
