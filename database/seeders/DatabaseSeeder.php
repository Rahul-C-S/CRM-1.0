<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Issue;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserGroup::create([
            'name' => 'admin_l1',
            'status' => 1,
        ]);

        UserGroup::create([
            'name' => 'admin_l2',
            'status' => 1,
        ]);
       

        User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'status' => 1,
            'role' => 1,
        ]);


        Client::factory(100)->create();
        Issue::factory(100)->create();

    }
}
