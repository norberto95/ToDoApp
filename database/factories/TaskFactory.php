<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(
                fake()->numberBetween(3,8)
            ),
            'content' => fake()->sentence(
                fake()->numberBetween(8,16)
            ),
            'status' => fake()->randomElement(
                Task::getAvailableStatuses()
            )
        ];
    }
}
