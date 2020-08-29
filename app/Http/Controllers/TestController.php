<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


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
            return redirect('/');
        }
    }

    public function delete($testId) {
        Test::destroy($testId);
    }

    /**
     * Show test questions.
     * @param $testId
     * @return mixed
     */
    public function showQuestions($testId)
    {
        $previousURI = $this->previousURI();
        $test = Test::find($testId);
        return view('tests.questions', ['test' => $test, 'previousURI' => $previousURI]);
    }


    /**
     * @return string Previous page URI|main page URI.
     */
    protected function previousURI()
    {
        $previousURI = parse_url(URL::previous(), PHP_URL_PATH);
        $previousURI = preg_match('/home/', $previousURI) ? $previousURI : '/';
        return $previousURI;
    }
}
