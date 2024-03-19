<?php

namespace App\Pipes;

use App\Models\Task;

class AddTaskPipe
{
    public function handle($taskDate, \Closure $next)
    {

        $task = Task::create($taskDate);
        return $next($task);
    }
}
