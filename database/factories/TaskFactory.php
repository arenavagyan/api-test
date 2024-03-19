<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Sodium\increment;


class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'description' => fake()->sentence(),
            'is_completed'=> fake()->boolean()
        ];
    }
}
