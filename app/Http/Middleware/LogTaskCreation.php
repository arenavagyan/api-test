<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class LogTaskCreation
{

    public function handle(Request $request,Closure $next)
    {
        Log::info('Task created: ' . $request->title);

        return $next($request);
    }
}
