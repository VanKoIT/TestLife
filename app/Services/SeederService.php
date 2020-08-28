<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use App\Models\Test;
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

    public function insertTest($title, $category,$img=null,$description=null) {
        return [
            'user_id' => $this->getRandomUserId(),
            'category_id' => $this->getCategoryId($category),
            'title' => $title,
            'description'=>$description,
            'photo_link' => 'images/'.$img
        ];
    }

    public function insertQuestions($testName, $questions) {
        $testId = $this->getTestId($testName);
        return $this->insertRaw(['test_id'=>$testId],$questions);
    }

    public function insertAnswers($questionText, $answers) {
        $questionId = $this->getQuestionId($questionText);
        return $this->insertRaw(['question_id'=>$questionId],$answers,true);
    }

    protected function insertRaw($parent,$items,$isAnswer=null) {
        $result=[];

        foreach ($items as $item) {
            if($isAnswer) $item['is_correct']=$item['is_correct']??0;
            $result[] = array_merge($parent, $item);
        }
        return $result;
    }
}
