<?php

namespace App\Http\Middleware;

use \Illuminate\Http\Request;
use Closure;
class ValidateTaskData
{
    public function handle(Request $request,Closure $next)
    {
        $validatedData = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
        ]);

        $request->merge($validatedData);

        return $next($request);
    }

}
