<?php

namespace App\Repositories\Write\Tasks;

use App\Models\Task;
use App\Repositories\Read\Tasks\TasksReadRepositoryInterface;
use App\Service\Tasks\Dto\StoreTaskDTO;
use Illuminate\Support\Facades\DB;

class WriteTaskRepository implements WriteTaskRepositoryInterface

{

    public function __construct(TasksReadRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;


    }

    public function create(StoreTaskDTO $dto)
    {
        $tasks = Task::create([
            'title' => $dto->name,
            'description' => $dto->description

        ]);
        $tasks->save();


    }

    public function update()
    {

    }

    public function delete(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
