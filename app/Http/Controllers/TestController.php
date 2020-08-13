<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller {
    public function index() {
        return view('welcome');
    }

    public function add(Request $request) {
        if ($request->isMethod('get')) {
            $categories=Category::all();
            return view('tests.add',['categories'=>$categories]);
        } elseif ($request->isMethod('post')) {
            $test=Test::create([
                'user_id'=>Auth::id(),
                'category_id'=>$request->category,
                'title'=>$request->title,
            ]);
            return redirect('/');
        }

    }

    public function delete($id) {
        $test=Test::find($id);
        if($test) $test->delete();
    }

    public function popular() {
        $categories = Category::all();
        return view('welcome',['categories'=>$categories]);
    }

    public function like(Request $request) {
        $test=Test::where('id', $request->input('id'));
        $test->increment('like_counter');
        return $test->first()->like_counter;
    }
}
