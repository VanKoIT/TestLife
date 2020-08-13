<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index($testId) {
        return Question::test($testId)->with('answers')->get();
    }
}
