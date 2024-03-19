<?php

namespace Database\Factories;

use App\Models\Worker;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{

    protected $model = Worker::class;

    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'done'=>fake()->boolean(),
            'task_id'=>Task::factory()->create(),

        ];
    }


}
