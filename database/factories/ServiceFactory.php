<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // e.g., "Hair Cut"
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 500), // e.g., 25.99
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
