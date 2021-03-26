<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(){
        if(\Auth::user() == null){
            return view('home');
        }
        $user = User::findOrFail(\Auth::user()->id);
        return view('home',compact('user'));
    }
}
