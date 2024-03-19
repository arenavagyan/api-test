<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subtask;
use App\Models\Task;
use App\Models\Worker;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {

        Task::factory()
            ->count(15)
            ->has(Subtask::factory()->count(3))
            ->has(Worker::factory()->count(1))
            ->create();
        $categories = Category::factory(5)->create();
        Task::all()->each(function ($task) use ($categories){

            $task->category()->attach($categories->random(rand(1,3))->pluck('id'));
        });
    }
}
