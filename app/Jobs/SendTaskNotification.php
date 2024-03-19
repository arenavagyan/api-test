<?php

namespace App\Jobs;

use App\Notifications\TaskCreatedNotification;
use App\Pipes\AddTaskPipe;
use App\Pipes\NotifyTaskCreatedPipe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Log;

class SendTaskNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $title;
    protected $description;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function handle()
    {
        try {
            $pipeline = app(Pipeline::class);

            $task = $pipeline
                ->send(['title' => $this->title,
                    'description' => $this->description
                ])
                ->through([
                    AddTaskPipe::class,
                    NotifyTaskCreatedPipe::class,
                ])
                ->thenReturn();
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }


        $task->notify(new TaskCreatedNotification($task));
    }
}
