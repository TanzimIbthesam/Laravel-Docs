<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStore;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth')->except(['index', 'show']);
        // //On the other hand if we only want to protect only some routes
        // return $this->middleware('auth')->only(['index', 'show']);
    }
    public function index()
    {
        //
        // DB::connection()->enableQueryLog();
        // DB::enableQueryLog();
        // // $blogs=Blog::all();
        // $blogs=Blog::with('comment')->get();
        // foreach($blogs as $blog){
        //     foreach($blog->comment as $commentone){
        //         echo $commentone->content;
        //     }
        // }
        // dd(DB::getQueryLog());
        //  return view('blogs.index', ['blogs' => Blog::withCount('comment')->get()]);
         return view('blogs.index',
         [

            'blogs' => Blog::latest()->withCount('comment')->get(),
            'mostCommented'=>Blog::mostCommented()->take(5)->get(),
            'mostActive'=>User::WithMostBlogPosts()->take(5)->get(),
            'mostActiveLastMonth'=>User::WithMostBlogPostsLastMonth()->take(5)->get(),


            ]);
        // return view('blogs.index',
        // ['blogs' =>
        // Blog::withCount('comment')
        // ->orderBy('created_at','desc')
        // ->get()
        // ]);
        //  return view('blogs.index',['blogs'=>Blog::find(1)->comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStore $request)
    {

        // $blog=new Blog();
        // $blog->user_id = Auth::user()->id;
        $validated = $request->validated();

        $validated['user_id'] = $request->user()->id;

        $blogPost = Blog::create($validated);
        //  dd($blogPost);
        $request->session()->flash('status', 'The Blog Post was Created!');
        return redirect()->route('blogs.index', ['blog' => $blogPost->id])->with('status', 'Your blog has been created');

        // $validateData=$request->validated();
        // $validatedData['user_id'] = $request->user()->id;
        // $blogPost=Blog::create($validateData);


        //      return redirect()->route('blogs.index', ['blog' => $blogPost->id])->with('status', 'Your blog has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


         return view('blogs.show', ['blog' => Blog::with('comment')->findorFail($id)]);
        //Local scope with closures
        // return view('blogs.show', ['blog' => Blog::with(['comment'=>function($query){
        //     return $query->latest();

        // }])->findorFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::findorFail($id);
        $this->authorize('update', $blog);

        return view('blogs.edit', ['blog' => Blog::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogStore $request, $id)
    {
        //

        $blog = Blog::findorFail($id);

        $this->authorize('update', $blog);
        $validateData = $request->validated();
        $blog->fill($validateData);

        $blog->save();

        return redirect()->route('blogs.index')->with('status', 'Your blog has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = Blog::findorFail($id);

        $this->authorize('delete', $blog);
        $blog->delete();

        return redirect()->route('blogs.index')->with('status', 'The blog has been deleted');
    }
}
