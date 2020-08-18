<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\SeederService;
use Illuminate\Support\Arr;

class QuestionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $seeder = new SeederService;
        $questions = [
            $seeder->insertQuestions('Компьютерные сети', [
                [
                    'text' => 'Чем отличается подключение компьютера к интернету по WiFi и LAN-проводу?',
                ],
                ['text' => 'Что такое IP адрес?'],
                ['text' => 'Чем отличается IPv4 и IPv6?'],
            ]),
            $seeder->insertQuestions('История россии', [
                ['text' => 'В каком году в России отменили крепостное право?'],
                ['text' => 'Какой князь крестил Русь? '],
                ['text' => 'Кто из перечисленных императриц не был самодержицей? '],
                ['text' => 'Кто считается главным языческим богом у славян?'],
                ['text' => 'Сколько лет современному московскому Кремлю?']
            ]),
            $seeder->insertQuestions('История россии - Романовы', [
                ['text' => 'Как назывались дворянские балы, чуть ли не принудительно введенные Петром I в культурную жизнь русского общества по европейскому образцу?'],
                ['text' => 'Как следовало обращаться к подполковнику русской императорской армии?'],
                ['text' => 'Как звали знаменитую сестру милосердия во время Крымской войны, показавшую самоотверженность во время обороны Севастополя и получившую почетное прозвище «Севастопольская»?'],
                ['text' => 'Автор фразы, получившей широкое распространение в годы крестьянской реформы 1861 года: «Народ освобожден, но счастлив ли народ?»'],
                ['text' => '«Прогрессивный блок» IV Государственной Думы, подготовивший в феврале 1917 года заговор с целью отречения императора Николая II от престола, состоял из:']
            ]),
        ];
        DB::table('questions')->insert(Arr::flatten($questions, 1));
    }
}