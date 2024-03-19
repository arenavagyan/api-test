<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    public function created(Task $task): void
    {
        dd('New task was created');
    }


    public function updated(Task $task): void
    {

    }


    public function deleting(Task $task): void
    {
        $task->subtasks()->delete();
        dd("Task No {$task->id} was deleted");
    }

    public function restored(Task $task): void
    {

    }


    public function forceDeleted(Task $task): void
    {
        //
    }
}
