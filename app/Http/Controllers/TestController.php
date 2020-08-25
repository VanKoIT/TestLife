<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller {

    public function index() {
        $categories = Category::with('tests')->get();
        return view('welcome', ['categories' => $categories]);
    }

    public function add(Request $request) {
        if ($request->isMethod('get')) {
            $categories = Category::all();
            return view('tests.add', ['categories' => $categories]);
        } elseif ($request->isMethod('post')) {
            Test::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'title' => $request->title,
            ]);
            return redirect('/');
        }
    }
}
