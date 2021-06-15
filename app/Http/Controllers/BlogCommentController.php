<?php

namespace App\Http\Controllers;

use App\Events\CommentPosted as EventsCommentPosted;
use App\Http\Requests\StoreComment;
use App\Jobs\NotifyUsersPostWasCommented;
use App\Jobs\ThrottleMail;
use App\Mail\CommentPosted;
use App\Mail\CommentPostedMarkDown;
use App\Mail\CommentPostedOnPostWatched;
use App\Mail\CommentPostedOnWatch;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        # code...
        $this->middleware('auth')->only(['store']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //Users have to be authenticated before they can send a comment
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $blog,StoreComment $request)
    {
        //
       $comment= $blog->comment()->create([
            'content'=>$request->input('content'),
            'user_id'=>$request->user()->id

        ]);
        // $request->session()->flash('status','Comment was created');
        event(new EventsCommentPosted($comment));
        // Mail::to($blog->user)->send(
        //      new CommentPostedMarkDown($comment)


        // );
        //For immediate processing
        // Mail::to($blog->user)->queue(
        //     //  new CommentPostedMarkDown($comment)

        //     new CommentPostedMarkdown($comment)
        // );
        // Mail::to($blog->user)->queue(
        //      new  CommentPostedMarkDown($comment)
        //     //new CommentPostedOnPostWatched($comment)
        // );


        //  ThrottleMail::dispatch(new CommentPostedMarkDown($comment),$blog->user);

        //  NotifyUsersPostWasCommented::dispatch($comment);
// NotifyUsersPostWasCommented::dispatch($comment);
        //For passing it one minute later
        // $when=now()->addMinutes(1);
        // Mail::to($blog->user)->later(
        //     $when,
        //     new CommentPostedMarkDown($comment)


        // );

        return redirect()->back()
        ->withStatus('Comment was created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
