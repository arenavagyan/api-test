<?php

namespace App\Repositories\Read\Tasks;

use App\Models\Task;
use App\Service\Tasks\Dto\GetTaskDTO;
use Illuminate\Database\Eloquent\Model;

class TasksReadRepository implements TasksReadRepositoryInterface
{

   public function index(GetTaskDTO $dto)
   {
      return $dto;
   }
}
