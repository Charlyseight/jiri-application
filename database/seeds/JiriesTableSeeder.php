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
            'user_id'=> 1,
            'schedule_on' => '2018-09-13 08:30:00'
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury septembre 2016',
            'user_id'=> 1,
            'schedule_on' => '2018-09-13 08:30:00'
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury juin 2017',
            'user_id'=> 3,
            'schedule_on' => '2018-09-13 08:30:00'
        ]);

        \Jiri\Jiri::create([
            'name' => 'Jury septembre 2017',
            'user_id'=> 4,
            'schedule_on' => '2018-09-13 08:30:00'
        ]);


    }
}
