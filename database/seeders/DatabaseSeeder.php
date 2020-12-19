<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
         //Alternatively we can write
        //  User::factory(10)->create();
        // $defaultUser = User::factory(1)->defaultUser()->create();
        // $otherUsers = User::factory(19)->create();

        // $users = $otherUsers->concat($defaultUser);
        if($this->command->confirm('Do you want to refresh database?')){
             $this->command->call('migrate:fresh');
             $this->command->info('Database was refreshed');
        }
        $this->call(UsersTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(BlogTagTableSeeder::class);

        // return $users;
    }

}
