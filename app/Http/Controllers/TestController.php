<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('test');
        BlogPost::all();

    }
}
