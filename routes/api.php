<?php

use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/v1')->group(function () {   Route::patch('/tasks/{task}/complete', \App\Http\Controllers\CompleteTaskController::class);});


Route::get('/tasks', [TaskController::class, 'show']);

Route::post('/task', [TaskController::class, 'store']);

Route::delete('/task/{id}', [TaskController::class, 'delete']);


// Creating methods

Route::post('/subtask', [\App\Http\Controllers\SubtaskController::class, 'store']);

Route::post('/worker', [\App\Http\Controllers\WorkerController::class, 'store']);

Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'store']);


// Updating methods

Route::patch('/task/{id}',[TaskController::class,'update']);

Route::patch('subtask/{id}',[\App\Http\Controllers\SubtaskController::class,'update']);

Route::patch('category/{id}',[\App\Http\Controllers\CategoryController::class,'update']);

// Deleting methods

Route::delete('/subtask/{id}',[\App\Http\Controllers\SubtaskController::class,'destroy']);







// ATTACH,DETACH,SYNC

Route::post('attach/task/{task_id}/category/{category_id}',[TaskController::class,'assignCategory']);

Route::post('detach/task/{task_id}/category/{category_id}',[TaskController::class,'detachCategory']);

Route::post('/task/{id}/sync',[TaskController::class,'syncCategories']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
