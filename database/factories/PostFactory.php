<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => '## ' . $this->faker->sentence() . "\n\n"
                . implode(' ', $this->faker->sentences(2)) . "\n\n"
                . implode(' ', $this->faker->sentences(4)),
        ];
    }
}
