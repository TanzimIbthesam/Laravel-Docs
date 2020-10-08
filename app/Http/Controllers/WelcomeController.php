<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        //To get id of current user
    //    dd(Auth::id());
       //To get deatils of the current user
    //    dd(Auth::user());
       //To check if user is authenticated or not
    //    dd(Auth::check());
        return view('home');
    }
}
