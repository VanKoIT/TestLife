<?php

namespace App\Http\Middleware;

use App\Models\Test;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTestGuest
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
        $testId=$request->testId??$request->input('test_id');
        $testAuthorId=Test::findOrFail($testId)->user_id;
        if(Auth::id()===$testAuthorId) {
            if($request->expectsJson()) {
                return abort(422,'Test author can not like it');
            } else {
                return redirect()->route('testHistory',$testId);
            }
        }
        return $next($request);
    }
}
