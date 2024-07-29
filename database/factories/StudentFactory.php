<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'classroom_id' => Classroom::inRandomOrder()->first()->id,
            'roll_no' => rand(0,50),
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address,
            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
        ];
    }
}
