<?php

namespace App\Http\Controllers;

use App\Models\Test;

class QuestionController extends Controller
{
    public function index($testId) {
        $test=Test::with('questions')->find($testId);
        return view('tests.questions',['test'=>$test]);
    }
}
