<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Role::factory(5)->create();

        // \App\Models\Role::factory()->create([
        //     'name' => 'admin',
        //     'created_at' => now(),
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\Role::factory()->create([
        //     'name' => 'user',
        //     'email' => 'test@example.com',
        //     'created_at' => now(),
        // ]);
    }
}
