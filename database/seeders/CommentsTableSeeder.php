<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blog=Blog::all();
        if($blog->count()===0){
            $this->command->info('There are no blog posts,so no comments will be added');
            return;
        }
        $commentCount = (int)$this->command->ask('How many comments you would like?', 10);
         $users =User::all();
        Comment::factory($commentCount)->make()->each(function ($comment) use ($blog,$users) {
            $comment->blog_id = $blog->random()->id;
            $comment->user_id=$users->random()->id;
            $comment->save();
    });
}

}
