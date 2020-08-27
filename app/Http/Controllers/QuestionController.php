<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\URL;


/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * Show test questions.
     * @param $testId
     * @return mixed
     */
    public function index($testId)
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
