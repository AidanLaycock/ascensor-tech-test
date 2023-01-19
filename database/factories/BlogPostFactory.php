<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\blogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'publish_at' => $this->faker->dateTimeBetween('now', '+1 year'),
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
