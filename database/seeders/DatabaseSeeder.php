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
        \App\Models\User::factory(7)->create();
        // \App\Models\Role::factory(7)->create();
        \App\Models\Salle::factory(7)->create();
        \App\Models\Artiste::factory(7)->create();
        \App\Models\Representation::factory(7)->create();
        \App\Models\Ticket::factory(7)->create();
        \App\Models\Spectacle::factory(7)->create();


        \App\Models\Role::factory()->create([
            'name' => 'admin',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'user',
        ]);

        \App\Models\Salle::factory()->create([
            'TypeSalle' => 'Salle des Fetes',
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Happy',
            'email' => 'azanmassouhappylouis@gmail.com',
            'role_id' => 1,

        ]);

        \App\Models\User::factory()->create([
            'username' => 'Louis',
            'email' => 'azanmassouhappy@gmail.com',
            'role_id' => 2,

        ]);

        $this->call([
            TicketRepresentationSeeder::class,
            SpectacleRepresentationSeeder::class,
        ]);
    }
}
