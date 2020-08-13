<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            ['name' => 'IT тесты'],
            ['name' => 'Сериалы'],
            ['name' => 'Школьные вопросы'],
            ['name' => 'Политические вопросы'],
            ['name' => 'Тесты на IQ'],
            ['name' => 'Интересные факты'],
            ['name' => 'Исторические вопросы'],
            ['name' => 'Логика'],
            ['name' => 'ОБЖ'],
            ['name' => 'Мультфильмы'],
            ['name' => 'Игры'],
            ['name' => 'Фильмы']
        ]);
    }
}
