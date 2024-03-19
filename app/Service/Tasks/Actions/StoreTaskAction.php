<?php

namespace App\Service\Tasks\Actions;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Repositories\Read\Tasks\TasksReadRepositoryInterface;
use App\Service\Tasks\Dto\StoreTaskDTO;
use App\Repositories\Read\Tasks\TasksReadRepository;
class StoreTaskAction
{

    public TasksReadRepository $taskRepository;

    public function __construct(TasksReadRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function run(StoreTaskDTO $dto)
    {
       $task = Task::query()->create([
           'name'=>$dto->name,
     ]);
       return $task;
    }






}
