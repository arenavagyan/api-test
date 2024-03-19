<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\TaskCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\SyncTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Jobs\SendTaskNotification;
use App\Models\Task;
use App\Notifications\TaskCreatedNotification;
use App\Repositories\Write\Tasks\WriteTaskRepositoryInterface;
use App\Service\Tasks\Actions\GetTaskAction;
use App\Service\Tasks\Dto\StoreTaskDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class TaskController extends Controller
{

    protected $RepositoryInterface;

    public function __construct(protected WriteTaskRepositoryInterface $taskRepositoryInterface)
    {
        $this->RepositoryInterface = $taskRepositoryInterface;
    }


    //CREATE

    public function store(StoreTaskRequest $request)
    {

        $title = $request->input('title');
        $description = $request->input('description');

        $task = Task::create([
            'title' => $title,
            'description' => $description
        ]);


        event(new TaskCreated($task));                                    //Event
        $task->notify(new TaskCreatedNotification($task));                //Notification
        SendTaskNotification::dispatch($title, $description);              //Job




//        $dto = StoreTaskDTO::fromRequest($request);
//        $this->taskRepositoryInterface->create($dto);


    }


//READ
    public
    function show(Task $task, GetTaskAction $getTaskAction)
    {
        $result = $getTaskAction->getAll($task);
        return $result;
    }

//UPDATE

    public
    function update(UpdateTaskRequest $request)
    {
        $task_id = $request->route('id');
        $task = Task::find($task_id);
        $task = $task->update([
            "title" => $request->title,
            "done" => $request->done,
            "description" => $request->description
        ]);
    }

//DELETE
    public
    function delete(int $id)
    {
        $this->taskRepositoryInterface->delete($id);
    }

    public
    function assignCategory(int $task_id, int $category_id)
    {
        $task = Task::query()->find($task_id);
        $task->category()->attach($category_id);
        $task->fresh();
    }

    public
    function detachCategory(int $task_id, int $category_id)
    {
        $task = Task::query()->find($task_id);
        $task->category()->detach($category_id);
        $task->fresh();
    }


    public
    function syncCategories(SyncTaskRequest $request, $taskId)
    {

        $subtaskIds = $request->input("categories_ids");
        Task::findOrFail($taskId)->category()->sync($subtaskIds);
    }
}
