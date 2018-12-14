<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\Score::create([
            'implement_id' => 1,
            'user_id'=> 1,
            'score' => 12,
            'comment' => 'Très bon travail, bonne réalisation des techniques et bonne logique. Un peu de perfectionnement cependant sur l‘emplacement du code php par moment mais dans l‘ensemble, bon travail !'
        ]);

        \Jiri\Score::create([
            'implement_id' => 1,
            'user_id'=> 2,
            'score' => 14,
            'comment' => 'Très bon travail !'
        ]);

        \Jiri\Score::create([
            'implement_id' => 2,
            'user_id'=> 3,
            'score' => 11,
            'comment' => 'Travail bien réalisé mais nécessite encore un peu de travail et de peaufinement.'
        ]);
    }
}
