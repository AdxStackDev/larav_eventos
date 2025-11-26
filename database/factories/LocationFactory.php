<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->address,
            'city' => fake()->city,
            'state' => fake()->state,
            'zip' => fake()->numberBetween(1000, 9000),
            'country' => fake()->country,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'timezone' => fake()->timezone,
            'event_id' => fake()->numberBetween(1, 10),
        ];
    }
}
