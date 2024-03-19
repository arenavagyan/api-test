<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Worker;
use App\Models\Task;

class WorkerController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(StoreWorkerRequest $request, Task $task)
    {
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $worker = $task->worker()->create([
            "name"=>$request->name,
            "done"=>0
        ]);


    }

    public function show()
    {
    }
    public function edit(Worker $worker)
    {
    }
    public function update(UpdateWorkerRequest $request, Worker $subtask1)
    {
    }
    public function destroy(Worker $worker)
    {

    }
}
