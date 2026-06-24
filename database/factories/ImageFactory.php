<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resource' => fake()->imageUrl(),
            'description' => fake()->sentence(),
            'is_public' => false
        ];
    }

    public function public(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_public' => true,
        ]);
    }
}
