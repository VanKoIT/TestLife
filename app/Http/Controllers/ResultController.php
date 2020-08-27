<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonInterface;


/**
 * Class ResultController
 * @package App\Http\Controllers
 */
class ResultController extends Controller
{
    protected $answers;
    protected $testId;

    /**
     * Shows the correctness of the user's answers to questions.
     * @param $attemptId
     * @return mixed
     */
    public function displayAttempt($attemptId)
    {
        $attempt = Attempt::with(['answers', 'test'])->findOrFail($attemptId);
        return view('tests.result', ['attempt' => $attempt]);
    }

    /**
     * Store attempt with answers
     * @param Request $request
     * @return mixed validation errors|correct and detail_link
     */
    public function saveResults(Request $request)
    {
        $this->answers = $request->input('answers');
        $validator = $this->validateAnswers();
        if ($validator !== true)
            return $validator;

        $correctAnswers = Answer::whereIn('id', $this->answers)->where('is_correct', 1)->count();
        $attempt = Attempt::create([
            'user_id' => Auth::id(),
            'test_id' => $this->testId,
            'questions_number' => count($this->answers),
            'questions_success' => $correctAnswers
        ]);

        foreach ($this->answers as &$answer) {
            $answer = [
                'attempt_id' => $attempt->id,
                'answer_id' => $answer
            ];
        }
        $attempt->answers()->attach($this->answers);

        $response = [
            'correct' => $correctAnswers,
            'detail_link' => '/result/' . $attempt->id
        ];
        return response($response, 200);
    }

    /**
     * Validate attempt data
     * @return bool|void
     */
    protected function validateAnswers()
    {
        //id ответов не переданы
        if (Arr::accessible($this->answers) && count($this->answers))
            $answers = Answer::with('question')->whereIn('id', $this->answers)->get(); else return abort(404);

        //кол-во ответов равно кол-ву отправленных
        if ($answers->count() == count($this->answers)) {
            $questions = $answers->map(function ($item) {
                return $item->question_id;
            });
            $test = $answers->map(function ($item) {
                return $item->question->test_id;
            });

            if ($questions != $questions->unique()->values()) {
                return abort(422, 'The number of questions does not correspond to the number of answers.');
            } else if ($test->unique()->count() !== 1) {
                return abort(422, 'Questions belong to different tests, or more answers than questions.');
            }

            $this->testId = $test[0];
            $questionsTotal = Question::where('test_id', $this->testId)->count();
            if ($questionsTotal != $questions->count())
                return abort(422, 'Not all questions are answered');

        } else return abort(404);

        return true;
    }
}
