<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if($this->command->confirm('Do you want to refresh database?')){
             $this->command->call('migrate:fresh');
             $this->command->info('Database was refreshed');

        }
        Cache::tags(['blog'])->flush();
        $this->call(UsersTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

        // return $users;
    }

}
