<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Representation>
 */
class RepresentationFactory extends Factory
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
            'NomRepresentation' => fake()->name(),
            'DateRepresentation' => fake()->date(),
            'HdebRepresentation' => fake()->time('H:i:s','now'),
            'HfinRepresentation' => fake()->time('H:i:s','now'),
        ];
    }
}
