<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class CheckTestAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $testAuthorId=Test::find($request->testId)->user_id;
        if(Auth::id()!==$testAuthorId) return abort(403);
        return $next($request);
    }
}
