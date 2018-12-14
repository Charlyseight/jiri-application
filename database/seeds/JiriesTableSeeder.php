<?php

use Illuminate\Database\Seeder;

class JiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Jiri\Jiri::create([
            'name' => 'Jury juin 2016',
            'user_id'=> 1
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury septembre 2016',
            'user_id'=> 2
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury juin 2017',
            'user_id'=> 3
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury septembre 2017',
            'user_id'=> 4
        ]);


    }
}
