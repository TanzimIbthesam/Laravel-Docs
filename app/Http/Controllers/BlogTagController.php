<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    //
    //
    public function index($tag)
    {
        # code...
        $tag=Tag::findOrFail($tag);
        return view('blogs.index',[
            'blogs'=>$tag->blog()
            // ->latest()
            // ->withCount('comment')
            // ->with('user')
            // ->with('tag')
            // ->get()
            ->latestWithRelations()->get()

        ]);
    }
}
