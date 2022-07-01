<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'username' => 'admin',
            'password' => '123',
            'email' => 'manhxhien@gmail.com',
            'fullname' => 'Demo Admin Panel',
            'access_token' => "admin",
            'role' => 9,
        ]);

        \App\Models\Settings::create([
            'name_key' => 'name_website',
            'name_value' => 'Lemanh.net DVMXH',
        ]);
    }
}
