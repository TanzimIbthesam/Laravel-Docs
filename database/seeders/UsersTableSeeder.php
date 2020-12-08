<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usersCount=(int)$this->command->ask('How many users you would like?',10);
        User::factory($usersCount)
        ->create();
    }
}
