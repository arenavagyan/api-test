<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminNewTask implements ShouldQueue
{

    use InteractsWithQueue;


    public function handle(TaskCreated $event)
    {
        $originalTask = $event->task;

        $relatedTask = new Task();
        $relatedTask->title = "Copy of {$originalTask->title}";
        $relatedTask->description = 'Description of related task';
        $relatedTask->save();


//        dd( "New task was added with name of {$event->task->title}");
    }
}
