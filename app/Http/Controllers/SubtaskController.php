<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubtaskRequest;
use App\Http\Requests\UpdateSubtaskRequest;
use App\Models\Subtask;
use App\Models\Task;

class SubtaskController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(StoreSubtaskRequest $request)
    {
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $subtask = $task->subtasks()->create([
            "title" => $request->title,
            "description" => $request->description
        ]);
    }
    public function update(UpdateSubtaskRequest $request, Subtask $subtask)
    {
        $subtask_id = $request->route('id');
        $subtask = Subtask::find($subtask_id);
        $subtask = $subtask->update([
            "title"=>$request->title,
            "task_id"=>$request->task_id
            ]);
    }



    public function show(Subtask $subtask)
    {
        //
    }
    public function edit(Subtask $subtask)
    {
        //
    }
    public function destroy()
    {

    }
}
