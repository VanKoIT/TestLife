<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use App\Models\Test;
use App\Models\QuestionType;
use App\Models\Question;

class SeederService {

    static public function getRandomUserId() {
        return User::pluck('id')->random();
    }

    static public function getCategoryId($categoryName) {
        return Category::where('name', $categoryName)->first('id')->id;
    }

    static public function getTestId($testName) {
        return Test::where('title', $testName)->first('id')->id;
    }

    static public function getQuestionId($question) {
        return Question::where('text', $question)->first('id')->id;
    }

    static public function getTypeId($type) {
        return QuestionType::where('type', $type)->first('id')->id;
    }

    public function insertTest($title, $category) {
        return [
            'user_id' => $this->getRandomUserId(),
            'category_id' => $this->getCategoryId($category),
            'title' => $title
        ];
    }

    public function insertQuestions($testName, $questions) {
        $testId = $this->getTestId($testName);
        $result=[];

        foreach ($questions as $question) {
            $typeId=$this->getTypeId($question['type']??'single');
            unset($question['type']);
            $result[] = array_merge(['test_id'=>$testId,'type_id'=>$typeId], $question);
        }
        return $result;
    }

    public function insertAnswers($questionText, $answers) {
        $questionId = $this->getQuestionId($questionText);
        $result=[];

        foreach ($answers as $answer) {
            $answer['is_correct']=$answer['is_correct']??0;
            $result[] = array_merge(['question_id'=>$questionId], $answer);
        }
        return $result;
    }
}
