<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruthDareSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('truth_dares')->insert([
            [
                'text' => 'Если бы была возможность завладеть всем чем захочешь, что бы это было в первую очередь?',
                'is_truth' => 1
            ],
            [
                'text' => 'Если бы была возможность завладеть всем чем захочешь, что бы это было в первую очередь?',
                'is_truth' => 1
            ],
            [
                'text' => 'Куда потратишь миллион евро, если он окажется у тебя в руках?',
                'is_truth' => 1
            ],
            [
                'text' => 'Если появится возможность стать невидимым, какое будет твое первое дело?',
                'is_truth' => 1
            ],
            [
                'text' => 'Какая часть тела у тебя самая привлекательная?',
                'is_truth' => 1
            ],
            [
                'text' => 'Если бы была возможность завладеть всем чем захочешь, что бы это было в первую очередь?',
                'is_truth' => 1
            ],
            [
                'text' => 'Какая часть тела у тебя самая привлекательная?',
                'is_truth' => 1
            ],
            [
                'text' => 'Съешь что-нибудь острое на кухне: перец, кетчуп, лук, лимон.',
                'is_truth' => 0
            ],
            [
                'text' => 'Съешь что-то не используя руки. Если это “что-то” нужно достать, ты также не должен использовать для этого руки.',
                'is_truth' => 0
            ],
            [
                'text' => 'Спародируй любого известного актера или певца (певицы) так, чтобы догадались о ком речь.',
                'is_truth' => 0
            ],
            [
                'text' => 'Скажи алфавит задом наперед за 30 секунд.',
                'is_truth' => 0
            ],
            [
                'text' => 'Выпей ложку подсолнечного масла или съешь кусок сливочного масла.',
                'is_truth' => 0
            ],
            [
                'text' => 'Поборись на больших пальцах с соседом слева.',
                'is_truth' => 0
            ],
        ]);
    }
}