<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{

    /**
     * Show tests list sorting by categories
     * @return mixed
     */
    public function index()
    {
        $categories = Category::with('tests')->get();
        return view('welcome', ['categories' => $categories]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $categories = Category::all();
            return view('tests.add', ['categories' => $categories]);
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'category' => 'required',
                'title' => 'required|max:255',
                'description' => 'required',
                'image' => 'image'
            ]);
            $path=$request->file('image')->store('images','public');

            $test=Test::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'photo_link' => $path
            ]);
            $response= ['id'=>$test->id];
            return response($response,200);
        }
    }
}
