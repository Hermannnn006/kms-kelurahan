<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'nip' => '19216811',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password' => bcrypt('password'),
            'foto' =>'/img/profil.jpg',
            'remember_token' => 'tokenadmin'
        ]);
        User::create([
            'name' => 'user',
            'nip' => '19216812',
            'email' => 'user@gmail.com',
            'level' => 'user',
            'password' => bcrypt('password'),
            'foto' =>'/img/profil.jpg',
            'remember_token' => 'tokenuser'
        ]);
    }
}
