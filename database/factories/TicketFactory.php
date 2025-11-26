<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->word,
            'description'=> fake()->text,
            'price'=> fake()->numberBetween(1, 10),
            'quantity'=> fake()->numberBetween(1, 10),
            'event_id'=> fake()->numberBetween(1, 10),
            'category_id'=> fake()->numberBetween(1, 10),
            'location_id'=> fake()->numberBetween(1, 10),
        ];
    }
}
