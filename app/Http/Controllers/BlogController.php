<?php

namespace App\Http\Controllers;

use App\Events\BlogPosted;
use App\Http\Requests\BlogStore;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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

         return view('blogs.index',
         [


            //   'blogs' => Blog::latest()->withCount('comment')->with('user','tag','comment')->get(),
                   'blogs'=>Blog::latestWithRelations()->get()


            ]);

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


        $validated = $request->validated();

        $validated['user_id'] = $request->user()->id;

        $blogPost = Blog::create($validated);

        if ($request->hasFile('blogimage')) {
            $path = $request->file('blogimage')->store('images', 'public');
            $blogPost->image()->save(
                Image::make(['path' => $path])
            );
        }
        event(new BlogPosted(($blogPost)));
        $request->session()->flash('status', 'The Blog Post was Created!');
        return redirect()->route('blogs.show', ['blog' => $blogPost->id])->with('status', 'Your blog has been created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $blog=Cache::tags(['blog'])->remember("blog-{$id}", 60, function () use($id){
             return  Blog::with('comment','tag','user','comment.user')
            ->findorFail($id);
        });
        $sessionId=session()->getId();
        $counterKey="blog-{$id}-counter";
        $usersKey="blog-{$id}-users";

        $users=Cache::get($usersKey,[]);
        $usersUpdate=[];
        $difference=0;
        $now=now();
        foreach ($users as $session => $lastVisit) {
            if($now->diffInMinutes($lastVisit)>=1){
                $difference--;
            }else{
                $usersUpdate[$session]=$lastVisit;
            }
            # code...
        }
        if(!array_key_exists($sessionId,$users)|| $now->diffInMinutes($users[$sessionId])>=1)
        {
            $difference++;
        }
             $counter=0;
             $usersUpdate[$sessionId]=$now;
             Cache::forever($usersKey,$usersUpdate);
             if(!Cache::has($counterKey)){
                 Cache::forever($counterKey,1);

             }else{
            Cache::increment($counterKey, $difference);
             }
           $counter=Cache::get($counterKey);
         return view('blogs.show',
         ['blog' =>$blog,
         'counter'=>$counter

         ]);

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
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            if($blog->image){
                Storage::delete($blog->image->path);
                $blog->image->path=$path;
                $blog->image->save();
            }
            $blog->image()->save(
                Image::make(['path' => $path])
            );
        }


        $blog->save();

        return redirect()->route('blogs.show', ['blog' => $blog])->with('status', 'Your blog has been updated');
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
