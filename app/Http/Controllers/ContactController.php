<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        # code...
        return view('blogs.contact');
    }
    public function secret()
    {
        # code...
        return view('blogs.secret');
    }
}
