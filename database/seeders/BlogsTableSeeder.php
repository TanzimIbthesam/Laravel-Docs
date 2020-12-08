<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blog = Blog::all();
        if ($blog->count() === 0) {
            $this->command->info('There are no blog posts');
        }
        $users=User::all();
        $blogCount = (int)$this->command->ask('How many blogs you would like?', 20);
        Blog::factory($blogCount)->make()->each(function($blog) use ($users){
            $blog->user_id=$users->random()->id;
            $blog->save();

        });

    }

}
