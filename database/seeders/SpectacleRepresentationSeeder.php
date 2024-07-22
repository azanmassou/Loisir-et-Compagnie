<?php

namespace Database\Seeders;

use App\Models\Representation;
use App\Models\Spectacle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpectacleRepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $spectacles = Spectacle::all();
        $representations = Representation::all();

        foreach ($representations as $representation) {
            foreach ($spectacles as $spectacle) {

                // Insérez les données dans la table pivot
                DB::table('representation_spectacle')->insert([
                    'spectacle_id' => $spectacle->id,
                    'representation_id' => $representation->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
