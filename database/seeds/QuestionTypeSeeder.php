<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            [
                'type' => 'single',
                'description' => 'Вопрос с одиним ответом',
            ],
            [
                'type' => 'multi',
                'description' => 'Вопрос с несколькими ответами',
            ],
            [
                'type' => 'image',
                'description' => 'Вопрос с картинками',
            ],

        ]);
    }
}
