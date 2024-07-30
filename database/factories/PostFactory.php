<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = fake()->sentence(10);
        $description = fake()->realText(500);
        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => $description,
            'excerpt' => Str::words($description, 50, '.....'),
            'user_id' => 11,
        ];
    }
}
