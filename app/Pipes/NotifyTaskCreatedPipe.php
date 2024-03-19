<?php

namespace App\Pipes;

use Closure;
use App\Notifications\TaskCreatedNotification;

class NotifyTaskCreatedPipe
{
    public function handle($task, Closure $next)
    {
        $task->notify(new TaskCreatedNotification($task));
        return $next($task);
    }
}
