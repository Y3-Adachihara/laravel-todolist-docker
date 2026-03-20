<?php

namespace Database\Factories;

use App\Models\Todolist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todolist>
 */
class TodolistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'content' => $this->faker->realText(30),
            'deadline' => $this->faker->date(),
            'status' => $this->faker->boolean(),
        ];
    }
}
