<?php

namespace Database\Seeders;

use App\Models\Representation;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TicketRepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
        $tickets = Ticket::all();
        $representations = Representation::all();

        foreach ($representations as $representation) {
            foreach ($tickets as $ticket) {
                // Générez des montants et des nombres de tickets aléatoires
                $montant = rand(1000, 5000);
                $nbticket = rand(1, 2000);

                // Insérez les données dans la table pivot
                DB::table('ticket_representation')->insert([
                    'ticket_id' => $ticket->id,
                    'representation_id' => $representation->id,
                    'montant' => $montant,
                    'nbticket' => $nbticket,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
    }
}
