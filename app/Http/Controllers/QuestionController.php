<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\URL;

class QuestionController extends Controller
{
    public function index($testId) {
        $previousURI = $this->previousURI();
        $test=Test::find($testId);
        return view('tests.questions',['test'=>$test,'previousURI'=>$previousURI]);
    }

    protected function previousURI() {
        $previousURI = parse_url(URL::previous(), PHP_URL_PATH);
        $previousURI=preg_match('/home/',$previousURI)?$previousURI:'/';
        return $previousURI;
    }
}
