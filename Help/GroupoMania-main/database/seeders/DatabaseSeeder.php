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
        // \App\Models\Entreprise::factory(10)->create();
        // \App\Models\User::factory(15)->create();
        // \App\Models\Post::factory(15)->create();
        \App\Models\Role::factory(1)->create();

        // \App\Models\Salle::factory(10)->create([
        //     'TypeSalle' => fake()->userName(),
        //     'capacite' => fake()->randomNumber(),
        // ]);
    }
}
