<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'publish_at' => fake()->dateTimeBetween('now', '+1 year'),
            'status' => true
        ];
    }

    public function inActive(): self
    {
        return $this->state([
           'status' => false
        ]);
    }

    public function unpublished(): self
    {
        return $this->state([
           'publish_at' => null
        ]);
    }
}
