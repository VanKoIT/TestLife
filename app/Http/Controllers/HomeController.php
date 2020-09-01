<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Test;
use App\Models\Attempt;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $decidedCounter = Attempt::where('user_id', Auth::id())->distinct()->count('test_id');
        $shortHistory = Attempt::where('user_id', Auth::id())
                               ->orderBy('passed_at','desc')
                               ->with('test')->get();
        $uncompleteUserTests = Test::personal(0);
        $userTests = Test::personal(1);
        $favoritesTests = User::find(Auth::id())->favoritesTests->reverse();

        return view('home', [
            'decidedCounter' => $decidedCounter,
            'shortHistory' => $shortHistory,
            'uncompleteUserTests' => $uncompleteUserTests,
            'userTests' => $userTests,
            'favoritesTests' => $favoritesTests
        ]);
    }

    /**
     * Show user test history.
     * @return mixed
     */
    public function history($testId)
    {
        $history = Attempt::where('test_id', $testId)
                          ->with('user')->get();
        $test = Test::find($testId);
        return view('tests.history', ['history' => $history, 'test' => $test]);
    }
}
