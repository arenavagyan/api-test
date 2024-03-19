<?php

namespace App\Providers;

use App\Repositories\Read\Tasks\TasksReadRepositoryInterface;
use App\Repositories\Read\Tasks\TasksReadRepository;
use App\Repositories\Write\Tasks\WriteTaskRepository;
use App\Repositories\Write\Tasks\WriteTaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TasksReadRepositoryInterface::class, TasksReadRepository::class);
        $this->app->bind(WriteTaskRepositoryInterface::class, WriteTaskRepository::class);
    }
}
