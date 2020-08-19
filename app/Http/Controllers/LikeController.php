<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public $testId;

    public function likeAdd(Request $request) {
        if ($this->getLike($request)) {
            return abort(422,'User has already liked this test');
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'test_id' => $this->testId
            ]);
            return response(null, 204);
        }
    }

    public function likeDelete(Request $request) {
        if ($like=$this->getLike($request)) {
            $like->delete();
            return response(null, 204);
        } else return abort(422,'User did not like this test');
    }

    protected function getLike($request) {
        $this->testId = $request->input('test_id');
        return Like::where('user_id', Auth::id())
                   ->where('test_id', $this->testId)->first();
    }
}
