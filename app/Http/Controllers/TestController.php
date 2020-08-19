<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Test;
use App\Models\Attempt;

class TestController extends Controller {
    public $answers;

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

    public function saveResults(Request $request) {
        $this->answers = $request->input('answers');
        $validator=$this->validateAnswers();
        if($validator!==true) return $validator;

        $testId = $request->input('test_id');
        $correctAnswers = Answer::whereIn('id', $this->answers)->where('is_correct', 1)->count();
        $attempt = Attempt::create([
            'user_id' => Auth::id(),
            'test_id' => $testId,
            'questions_number' => count($this->answers),
            'questions_success' => $correctAnswers
        ]);

        foreach ($this->answers as &$answer) {
            $answer = [
                'attempt_id' => $attempt->id,
                'answer_id' => $answer
            ];
        }
        $attempt->answers()->createMany($this->answers);

        $response=['correct'=>$correctAnswers];
        return response($response,200);
    }

    protected function validateAnswers() {
        $answers = Answer::with('question')->whereIn('id', $this->answers)->get();
        //кол-во ответов равно кол-ву вопросов
        if($answers->count()==count($this->answers)) {
            $questions = $answers->map(function ($item) {
                return $item->question_id;
            });
            if ($questions != $questions->unique()->values()) {
                return abort(422,'The number of questions does not correspond to the number of answers.');
            }
            //принадлежат ли вопросы 1 тесту
            $test = $answers->map(function ($item) {
                return $item->question->test_id;
            });
            if ($test->unique()->count() !== 1) {
                return abort(422,'Questions belong to different tests.');
            }
        } else return response(null,404);

        return true;
    }
}
