<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tagCount=Tag::all()->count();
        if(0===$tagCount){
            $this->command->info('No tags found');
            return;
        }
        // $howManyMinTag=(int)$this->command->ask('Minimum tags in Blog Post',0);
        $howManyMin = (int)$this->command->ask('Minimum tags on blog post?', 0);

        $howManyMax = min((int)$this->command->ask('Maximum tags on blog post?', $tagCount), $tagCount);
        Blog::all()->each(function (Blog $blog) use ($howManyMin, $howManyMax) {
            $take = random_int($howManyMin, $howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $blog->tag()->sync($tags);
        });
    }
}
