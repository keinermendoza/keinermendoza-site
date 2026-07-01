<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'content' => $this->faker->paragraph(3),
            'phone' => $this->faker->optional(0.7)->phoneNumber(),
            'readed' => $this->faker->boolean(20),
            'is_spam' => $this->faker->boolean(10),
        ];
    }
}
