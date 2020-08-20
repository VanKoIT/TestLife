<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $decidedCounter=Attempt::where('user_id',Auth::id())
                               ->distinct()->count('test_id');
        return view('home',['decidedCounter'=>$decidedCounter]);
    }
}
