<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salle>
 */
class SalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'TypeSalle' => fake()->name(),
            'Capacite' => fake()->numberBetween(500,10000),
            // 'representation_id' => fake()->numberBetween(1,5),
        ];
    }
}
