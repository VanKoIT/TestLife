<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Attempt;
use Illuminate\Support\Facades\Auth;

class CheckAttemptUser
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
        $attempt = Attempt::findOrFail($request->attemptId);
        $testAuthor = $attempt->test->user_id;

        if ($attempt->user_id == Auth::id() || $testAuthor == Auth::id())
            return $next($request);
        return abort(403);
    }
}
