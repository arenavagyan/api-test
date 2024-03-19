<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Task;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $category = $task->category()->create([
            "name" => $request->name,

        ]);
        $task->category()->sync([1,2,3]);
        dd($category);
    }


    public function show(Category $category)
    {

    }


    public function edit(Category $category)
    {
        //
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category_id = $request->route('id');
        $category = Category::find($category_id);
        $category = $category->update([
            "name"=>$request->name
        ]);


    }


    public function destroy(Category $category)
    {
        //
    }
}
