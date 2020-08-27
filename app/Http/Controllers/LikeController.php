<?php

namespace App\Http\Controllers;

use App\Models\Like;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    public $testId;

    /**
     * Adds a like to test.
     * @param Request $request
     * @return mixed Success of adding a like.
     */
    public function likeAdd(Request $request)
    {
        if ($this->getLike($request)) {
            return abort(422, 'User has already liked this test');
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'test_id' => $this->testId
            ]);
            return response(null, 204);
        }
    }

    /**
     * Delete the like from the test.
     * @param Request $request
     * @return mixed Success of deletion a like.
     */
    public function likeDelete(Request $request)
    {
        if ($like = $this->getLike($request)) {
            $like->delete();
            return response(null, 204);
        } else return abort(422, 'User did not like this test');
    }

    /**
     * Search for a given like.
     * @param $request
     * @return object|null \App\Models\Like
     */
    protected function getLike($request)
    {
        $this->testId = $request->input('test_id');
        return Like::where('user_id', Auth::id())->where('test_id', $this->testId)->first();
    }
}
