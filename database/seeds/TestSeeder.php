<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SeederService;

class TestSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $seeder =new SeederService();

        DB::table('tests')->insert([
            $seeder->insertTest('Компьютерные сети','IT тесты'),
            $seeder->insertTest('Разработка(базовый','IT тесты'),
            $seeder->insertTest('Операционные системы','IT тесты'),
            $seeder->insertTest('История россии','Исторические вопросы '),
            $seeder->insertTest('История россии - Романовы','Исторические вопросы ')
        ]);
    }

}
